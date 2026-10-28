<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderByDesc('id')->paginate(12);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:blogs,title',
            'content' => 'required|string',
            'meta' => 'nullable|string|max:500',
            'key_words' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif|max:5120',
        ], [], [
            'title' => 'tiêu đề',
            'content' => 'nội dung',
            'meta' => 'mô tả meta',
            'key_words' => 'từ khoá',
            'image' => 'ảnh đại diện',
        ]);

        $nameImage = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blogs'), $imageName);
            $nameImage = "images/blogs/" . $imageName;
        }

        Blog::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'slug' => Str::slug($validated['title']),
            'meta' => $validated['meta'] ?? null,
            'key_words' => $validated['key_words'] ?? null,
            'image' => $nameImage,
        ]);

        return redirect()->back()->with('success', 'Thêm bài viết thành công');
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
        $blog = Blog::findOrFail($id);

        if ($blog->image && file_exists(public_path($blog->image))) {
            @unlink(public_path($blog->image));
        }

        $blog->delete();

        return redirect()->back()->with('success', 'Xóa bài viết thành công');
    }
}
