<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryChild;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryChildController extends Controller
{
    public function index()
    {
        $categoryChildren = CategoryChild::with('category')->orderBy('created_at', 'desc')->paginate(12);
        return view('admin.category-children.index', compact('categoryChildren'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.category-children.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request) {
                    $exists = CategoryChild::where('name', $value)
                        ->where('category_id', $request->category_id)
                        ->exists();
                    if ($exists) {
                        $fail('Tên danh mục con "' . $value . '" đã tồn tại trong danh mục cha này.');
                    }
                }
            ],
            'image' => 'nullable|image|mimes:jpeg,webp,png,jpg,gif,svg',
        ]);
        $data = $request->all();

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_child.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/category-children'), $imageName);
            $data['image'] = 'images/category-children/' . $imageName;
        }

        // Tạo slug từ name
        $data['slug'] = Str::slug($data['name']);

        CategoryChild::create($data);

        return redirect()->back()->with('success', 'Danh mục con đã được thêm thành công');
    }

    public function edit($id)
    {
        $categoryChild = CategoryChild::findOrFail($id);
        $categories = Category::all();
        return view('admin.category-children.edit', compact('categoryChild', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $categoryChild = CategoryChild::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request, $id) {
                    $exists = CategoryChild::where('name', $value)
                        ->where('category_id', $request->category_id)
                        ->where('id', '!=', $id)
                        ->exists();
                    if ($exists) {
                        $fail('Tên danh mục con "' . $value . '" đã tồn tại trong danh mục cha này.');
                    }
                }
            ],
            'image' => 'nullable|image|mimes:jpeg,webp,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        // Xử lý upload ảnh mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($categoryChild->image && file_exists(public_path($categoryChild->image))) {
                unlink(public_path($categoryChild->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_child.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/category-children'), $imageName);
            $data['image'] = 'images/category-children/' . $imageName;
        } else {
            // Giữ nguyên ảnh cũ nếu không upload mới
            $data['image'] = $categoryChild->image;
        }

        // Tạo slug từ name
        $data['slug'] = Str::slug($data['name']);

        $categoryChild->update($data);

        return redirect()->route('admin.category-children.index')->with('success', 'Danh mục con đã được cập nhật thành công');
    }

    public function destroy($id)
    {
        $categoryChild = CategoryChild::findOrFail($id);

        // Xóa ảnh nếu có
        if ($categoryChild->image && file_exists(public_path($categoryChild->image))) {
            unlink(public_path($categoryChild->image));
        }

        $categoryChild->delete();

        return redirect()->route('admin.category-children.index')->with('success', 'Danh mục con đã được xóa thành công');
    }
}
