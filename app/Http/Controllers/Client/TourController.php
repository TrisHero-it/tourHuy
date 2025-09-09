<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

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
}
