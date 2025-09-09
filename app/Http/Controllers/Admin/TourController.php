<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

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
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'category_child_id' => 'nullable|exists:category_childs,id',
            'images' => 'required|array|size:3',
            'images.*' => 'required|image|mimes:jpeg,png,webp,jpg,gif|max:5120',
        ]);

        $data = $validated;
        $data['slug'] = $this->slugify($validated['name']);

        $storedImages = [];
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/tours'), $imageName);
            $storedImages[] = "images/tours/" . $imageName;
        }
        $data['image'] = $storedImages;

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
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'category_child_id' => 'nullable|exists:category_childs,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,webp,jpg,gif|max:5120',
            'duration' => 'nullable|string',
        ]);

        $data = $validated;
        $data['slug'] = $this->slugify($validated['name']);

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

    function slugify(string $text): string
    {
        // Chuyển chữ có dấu → không dấu (mọi ngôn ngữ, gồm tiếng Việt)
        if (class_exists('Transliterator')) {
            $trans = \Transliterator::create('Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC');
            $text = $trans->transliterate($text);
        } else {
            // Fallback tối thiểu: thay thế một số dấu tiếng Việt phổ biến
            $replacements = [
                'à' => 'a',
                'á' => 'a',
                'ạ' => 'a',
                'ả' => 'a',
                'ã' => 'a',
                'â' => 'a',
                'ầ' => 'a',
                'ấ' => 'a',
                'ậ' => 'a',
                'ẩ' => 'a',
                'ẫ' => 'a',
                'ă' => 'a',
                'ằ' => 'a',
                'ắ' => 'a',
                'ặ' => 'a',
                'ẳ' => 'a',
                'ẵ' => 'a',
                'è' => 'e',
                'é' => 'e',
                'ẹ' => 'e',
                'ẻ' => 'e',
                'ẽ' => 'e',
                'ê' => 'e',
                'ề' => 'e',
                'ế' => 'e',
                'ệ' => 'e',
                'ể' => 'e',
                'ễ' => 'e',
                'ì' => 'i',
                'í' => 'i',
                'ị' => 'i',
                'ỉ' => 'i',
                'ĩ' => 'i',
                'ò' => 'o',
                'ó' => 'o',
                'ọ' => 'o',
                'ỏ' => 'o',
                'õ' => 'o',
                'ô' => 'o',
                'ồ' => 'o',
                'ố' => 'o',
                'ộ' => 'o',
                'ổ' => 'o',
                'ỗ' => 'o',
                'ơ' => 'o',
                'ờ' => 'o',
                'ớ' => 'o',
                'ợ' => 'o',
                'ở' => 'o',
                'ỡ' => 'o',
                'ù' => 'u',
                'ú' => 'u',
                'ụ' => 'u',
                'ủ' => 'u',
                'ũ' => 'u',
                'ư' => 'u',
                'ừ' => 'u',
                'ứ' => 'u',
                'ự' => 'u',
                'ử' => 'u',
                'ữ' => 'u',
                'ỳ' => 'y',
                'ý' => 'y',
                'ỵ' => 'y',
                'ỷ' => 'y',
                'ỹ' => 'y',
                'đ' => 'd',
                'À' => 'A',
                'Á' => 'A',
                'Ạ' => 'A',
                'Ả' => 'A',
                'Ã' => 'A',
                'Â' => 'A',
                'Ầ' => 'A',
                'Ấ' => 'A',
                'Ậ' => 'A',
                'Ẩ' => 'A',
                'Ẫ' => 'A',
                'Ă' => 'A',
                'Ằ' => 'A',
                'Ắ' => 'A',
                'Ặ' => 'A',
                'Ẳ' => 'A',
                'Ẵ' => 'A',
                'È' => 'E',
                'É' => 'E',
                'Ẹ' => 'E',
                'Ẻ' => 'E',
                'Ẽ' => 'E',
                'Ê' => 'E',
                'Ề' => 'E',
                'Ế' => 'E',
                'Ệ' => 'E',
                'Ể' => 'E',
                'Ễ' => 'E',
                'Ì' => 'I',
                'Í' => 'I',
                'Ị' => 'I',
                'Ỉ' => 'I',
                'Ĩ' => 'I',
                'Ò' => 'O',
                'Ó' => 'O',
                'Ọ' => 'O',
                'Ỏ' => 'O',
                'Õ' => 'O',
                'Ô' => 'O',
                'Ồ' => 'O',
                'Ố' => 'O',
                'Ộ' => 'O',
                'Ổ' => 'O',
                'Ỗ' => 'O',
                'Ơ' => 'O',
                'Ờ' => 'O',
                'Ớ' => 'O',
                'Ợ' => 'O',
                'Ở' => 'O',
                'Ỡ' => 'O',
                'Ù' => 'U',
                'Ú' => 'U',
                'Ụ' => 'U',
                'Ủ' => 'U',
                'Ũ' => 'U',
                'Ư' => 'U',
                'Ừ' => 'U',
                'Ứ' => 'U',
                'Ự' => 'U',
                'Ử' => 'U',
                'Ữ' => 'U',
                'Ỳ' => 'Y',
                'Ý' => 'Y',
                'Ỵ' => 'Y',
                'Ỷ' => 'Y',
                'Ỹ' => 'Y',
                'Đ' => 'D',
            ];
            $text = strtr($text, $replacements);
        }

        $text = strtolower($text);
        // Đổi mọi thứ không phải a-z0-9 thành dấu gạch ngang
        $text = preg_replace('/[^a-z0-9]+/i', '-', $text);
        // Gom nhiều dấu '-' liên tiếp thành 1 và trim hai đầu
        $text = preg_replace('/-+/', '-', $text);
        return trim($text, '-');
    }
}
