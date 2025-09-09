<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryChild;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('categoryChild')->paginate(12);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,webp,jpg,gif|max:5120',
            'banner' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif|max:5120',
            'is_nav' => 'boolean',
            'is_featured' => 'boolean',
            'is_banner' => 'boolean',
        ]);

        $data = $validated;
        $data['slug'] = $this->slugify($validated['name']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $data['image'] = "images/categories/" . $imageName;
        }

        // Handle banner upload
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '_banner.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('images/categories'), $bannerName);
            $data['banner'] = "images/categories/" . $bannerName;
        }

        // Convert checkboxes to boolean
        $data['is_nav'] = $request->has('is_nav') ? 1 : 0;
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_banner'] = $request->has('is_banner') ? 1 : 0;

        Category::create($data);
        return redirect()->back()->with('success', 'Tạo danh mục thành công');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif|max:5120',
            'banner' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif|max:5120',
            'is_nav' => 'boolean',
            'is_featured' => 'boolean',
            'is_banner' => 'boolean',
        ]);

        $data = $validated;
        $data['slug'] = $this->slugify($validated['name']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $data['image'] = "images/categories/" . $imageName;
        } else {
            unset($data['image']);
        }

        // Handle banner upload
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '_banner.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('images/categories'), $bannerName);
            $data['banner'] = "images/categories/" . $bannerName;
        } else {
            unset($data['banner']);
        }

        // Convert checkboxes to boolean
        $data['is_nav'] = $request->has('is_nav') ? 1 : 0;
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_banner'] = $request->has('is_banner') ? 1 : 0;

        $category->update($data);
        return redirect('/admin/categories')->with('success', 'Cập nhật danh mục thành công');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Xóa danh mục thành công');
    }

    public function categoryChildsByCategory($categoryId)
    {
        $categoryChilds = CategoryChild::where('category_id', $categoryId)->get();
        return response()->json($categoryChilds);
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
