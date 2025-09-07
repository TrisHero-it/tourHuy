<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show(string $slug)
    {
        $blog = Blog::query()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('Client.blog.blog', compact('blog'));
    }
}


