<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Logo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with(['categoryChild', 'tours'])->get();
        $banners = Banner::where('status', 'active')->first();
        $blog = Blog::orderBy('id', 'desc')->take(3)->get();
        $logo = Logo::where('status', 'active')->first();
        $categoriesNav = $categories->where('is_nav', true)->take(8);
        $categoriesBanner = $categories->where('is_banner', true)->take(6);
        $categoriesFeature = $categories->where('is_featured', true)->take(5);

        return view('client.index', compact('categoriesNav', 'categoriesBanner', 'categoriesFeature', 'blog', 'banners', 'logo'));
    }
}
