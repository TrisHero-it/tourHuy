<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Order;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    /**
     * Display tour detail with category child
     */
    public function showWithCategoryChild($categorySlug, $categoryChildSlug, $tourSlug)
    {
        // Tìm category cha theo slug
        $category = Category::where('slug', $categorySlug)
            // ->where('status', 'active')
            ->first();

        if (!$category) {
            abort(404, 'Category not found');
        }

        // Tìm category child theo slug và thuộc category cha này
        $categoryChild = $category->categoryChild()
            ->where('slug', $categoryChildSlug)
            // ->where('status', 'active')
            ->first();

        if (!$categoryChild) {
            abort(404, 'Category child not found');
        }

        // Tìm tour theo slug và thuộc category child này
        $tour = Tour::where('slug', $tourSlug)
            ->where('category_child_id', $categoryChild->id)
            ->where('status', 'active')
            ->with(['category', 'categoryChild'])
            ->first();

        if (!$tour) {
            abort(404, 'Tour not found');
        }

        // Lấy thông tin liên hệ từ bảng account
        $account = Account::first();

        return view('client.tour.detail', compact('category', 'categoryChild', 'tour', 'account'));
    }

    /**
     * Handle tour booking
     */
    public function booking(Request $request)
    {
        try {
            // Validate request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'tour_id' => 'required|exists:tours,id',
                'email' => 'required|email|max:255'
            ]);

            // Get tour details
            $tour = Tour::findOrFail($validated['tour_id']);

            // Create order
            $order = Order::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'tour_id' => $validated['tour_id'],
                'price_now' => $tour->price,
                'status' => 'Chưa liên hệ',
                'email' => $validated['email']
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Đặt tour thành công! Mã đơn hàng: #' . $order->id,
                'order_id' => $order->id
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation errors
            $errors = $e->validator->errors();
            $errorMessages = [];

            foreach ($errors->all() as $error) {
                $errorMessages[] = $error;
            }

            return response()->json([
                'success' => false,
                'message' => 'Vui lòng kiểm tra lại thông tin: ' . implode(', ', $errorMessages),
                'errors' => $errors,
                'error' => 'Validation failed'
            ], 422);
        } catch (\Exception $e) {
            // Other errors
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi đặt tour. Vui lòng thử lại sau.',
                'error' => $e->getMessage(),
                'errors' => null
            ], 500);
        }
    }
}
