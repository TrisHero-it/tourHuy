<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blogs'), $imageName);
            $request->merge(['image' => "images/blogs/" . $imageName]);
            $nameImage =  "images/blogs/" . $imageName;
        }
        $slug = $this->slugify($request->title);
        $blog = Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'meta' => $request->meta,
            'key_words' => $request->key_words,
            'image' => $nameImage,
        ]);
        return redirect()->back()->with('success', 'Blog thêm thành công');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blogs'), $imageName);
            return response()->json([
                'fileName' => $imageName,
                'uploaded' => true,
                'url' => asset('images/blogs/' . $imageName)
            ]);
        }
    }

    public function  destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Blog xóa thành công');
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
