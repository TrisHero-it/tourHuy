<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::with('category', 'categoryChild')->orderBy('created_at', 'desc')->paginate(12);
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
            'category_id' => 'required|exists:categories,id',
            'category_child_id' => 'nullable|exists:category_childs,id',
            'price_usd' => 'nullable|string|max:255',
            'name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request) {
                    $query = Tour::where('name', $value);

                    // Nếu có category_child_id thì check trong danh mục con
                    if ($request->category_child_id) {
                        $exists = $query->where('category_child_id', $request->category_child_id)->exists();
                        if ($exists) {
                            $fail('Tên tour "' . $value . '" đã tồn tại trong danh mục con này.');
                        }
                    } else {
                        // Nếu không có category_child_id thì check trong danh mục cha
                        $exists = $query->where('category_id', $request->category_id)
                            ->whereNull('category_child_id')
                            ->exists();
                        if ($exists) {
                            $fail('Tên tour "' . $value . '" đã tồn tại trong danh mục cha này.');
                        }
                    }
                }
            ],
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
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
            'category_id' => 'required|exists:categories,id',
            'category_child_id' => 'nullable|exists:category_childs,id',
            'price_usd' => 'nullable|string|max:255',
            'name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request, $id) {
                    $query = Tour::where('name', $value)->where('id', '!=', $id);

                    // Nếu có category_child_id thì check trong danh mục con
                    if ($request->category_child_id) {
                        $exists = $query->where('category_child_id', $request->category_child_id)->exists();
                        if ($exists) {
                            $fail('Tên tour "' . $value . '" đã tồn tại trong danh mục con này.');
                        }
                    } else {
                        // Nếu không có category_child_id thì check trong danh mục cha
                        $exists = $query->where('category_id', $request->category_id)
                            ->whereNull('category_child_id')
                            ->exists();
                        if ($exists) {
                            $fail('Tên tour "' . $value . '" đã tồn tại trong danh mục cha này.');
                        }
                    }
                }
            ],
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
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
        Order::where('tour_id', $id)->delete();
        $tour = Tour::findOrFail($id);
        $tour->delete();
        return redirect()->back()->with('success', 'Xoá tour thành công');
    }
}
