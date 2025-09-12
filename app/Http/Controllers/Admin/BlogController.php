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
        $slug = Str::slug($request->title);
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
}
