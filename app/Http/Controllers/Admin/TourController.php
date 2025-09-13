<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::with('category', 'categoryChild')->orderBy('id', 'desc')->paginate(12);
        return view('admin.tours.index', compact('tours'));
    }

    public function create()
    {
        $categories = Category::with('categoryChild')->get();
        return view('admin.tours.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'category_child_id' => 'nullable|exists:category_childs,id',
            'images' => 'nullable|array|size:3',
            'images.*' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif',
            'duration' => 'nullable|string|max:255',
        ]);

        $data = $validated;
        $data['slug'] = Str::slug($validated['name']);

        if ($request->hasFile('images')) {
            $storedImages = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/tours'), $imageName);
                $storedImages[] = "images/tours/" . $imageName;
            }
            $data['image'] = $storedImages;
        }

        $data['schedule'] = "Khởi hành vào buổi sáng";
        $data['status'] = 'active';
        $tour = Tour::create($data);
        return redirect()->back()->with('success', 'Tạo tour thành công');
    }

    public function edit($id)
    {
        $tour = Tour::findOrFail($id);
        $categories = Category::with('categoryChild')->get();
        return view('admin.tours.edit', compact('tour', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'category_child_id' => 'nullable|exists:category_childs,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,webp,jpg,gif|max:5120',
            'duration' => 'nullable|string|max:255',
        ]);

        $data = $validated;
        $data['slug'] = Str::slug($validated['name']);

        if ($request->hasFile('images')) {
            $request->validate([
                'images' => 'array|size:3',
            ]);
            $storedImages = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/tours'), $imageName);
                $storedImages[] = "images/tours/" . $imageName;
            }
            $data['image'] = $storedImages;
        } else {
            unset($data['image']);
        }

        $tour->update($data);

        return redirect('/admin/tours')->with('success', 'Cập nhật tour thành công');
    }

    public function delete($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete();
        return redirect()->back()->with('success', 'Xoá tour thành công');
    }
}
