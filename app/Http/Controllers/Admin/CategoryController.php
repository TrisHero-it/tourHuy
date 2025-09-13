<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryChild;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('categoryChild')->orderBy('order', 'asc')->paginate(12);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'meta' => 'nullable|string',
            'order' => 'nullable|integer|min:1|max:8',
            'image' => 'nullable|image|mimes:jpeg,webp,png,jpg,gif,svg',
            'banner' => 'nullable|image|mimes:jpeg,webp,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        // Xử lý upload ảnh thumbnail
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_thumb.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $data['image'] = 'images/categories/' . $imageName;
        }

        // Xử lý upload ảnh banner
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '_banner.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('images/categories'), $bannerName);
            $data['banner'] = 'images/categories/' . $bannerName;
        }

        // Tạo slug từ name
        $data['slug'] = Str::slug($data['name']);

        // Xử lý checkbox values chính xác 0/1
        $data['is_nav'] = $request->boolean('is_nav') ? 1 : 0;
        $data['is_featured'] = $request->boolean('is_featured') ? 1 : 0;
        $data['is_banner'] = $request->boolean('is_banner') ? 1 : 0;

        // Xử lý order - nếu order đã tồn tại thì đẩy các order khác lên
        if ($request->filled('order')) {
            $newOrder = $request->order;
            $existingCategory = Category::where('order', $newOrder)->first();
            
            if ($existingCategory) {
                // Tìm order trống gần nhất
                $emptyOrder = $this->findEmptyOrder();
                if ($emptyOrder) {
                    $existingCategory->update(['order' => $emptyOrder]);
                }
            }
        }

        Category::create($data);

        return redirect()->back()->with('success', 'Danh mục đã được thêm thành công');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'meta' => 'nullable|string',
            'order' => 'nullable|integer|min:1|max:8',
            'image' => 'nullable|image|mimes:jpeg,webp,png,jpg,gif,svg',
            'banner' => 'nullable|image|mimes:jpeg,webp,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        // Xử lý upload ảnh thumbnail mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_thumb.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $data['image'] = 'images/categories/' . $imageName;
        } else {
            // Giữ nguyên ảnh cũ nếu không upload mới
            $data['image'] = $category->image;
        }

        // Xử lý upload ảnh banner mới
        if ($request->hasFile('banner')) {
            // Xóa ảnh banner cũ nếu có
            if ($category->banner && file_exists(public_path($category->banner))) {
                unlink(public_path($category->banner));
            }

            $banner = $request->file('banner');
            $bannerName = time() . '_banner.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('images/categories'), $bannerName);
            $data['banner'] = 'images/categories/' . $bannerName;
        } else {
            // Giữ nguyên ảnh banner cũ nếu không upload mới
            $data['banner'] = $category->banner;
        }

        // Tạo slug từ name
        $data['slug'] = Str::slug($data['name']);

        // Xử lý checkbox values chính xác 0/1
        $data['is_nav'] = $request->boolean('is_nav') ? 1 : 0;
        $data['is_featured'] = $request->boolean('is_featured') ? 1 : 0;
        $data['is_banner'] = $request->boolean('is_banner') ? 1 : 0;

        // Xử lý order - swap order nếu có xung đột
        if ($request->filled('order')) {
            $newOrder = $request->order;
            $oldOrder = $category->order;
            
            if ($newOrder != $oldOrder) {
                $existingCategory = Category::where('order', $newOrder)->where('id', '!=', $id)->first();
                
                if ($existingCategory) {
                    // Swap order: danh mục hiện tại lấy order mới, danh mục cũ lấy order cũ
                    $existingCategory->update(['order' => $oldOrder]);
                }
            }
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được cập nhật thành công');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Xóa ảnh thumbnail nếu có
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }

        // Xóa ảnh banner nếu có
        if ($category->banner && file_exists(public_path($category->banner))) {
            unlink(public_path($category->banner));
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được xóa thành công');
    }

    public function categoryChildsByCategory($id)
    {
        $categoryChilds = CategoryChild::where('category_id', $id)->get();
        return response()->json($categoryChilds);
    }

    /**
     * Tìm order trống gần nhất
     */
    private function findEmptyOrder()
    {
        for ($i = 1; $i <= 8; $i++) {
            if (!Category::where('order', $i)->exists()) {
                return $i;
            }
        }
        return null;
    }
}
