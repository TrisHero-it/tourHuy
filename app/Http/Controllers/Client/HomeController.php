<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('categoryChild')->get();
        $categoriesNav = $categories->where('is_nav', true)->take(8);
        $categoriesBanner = $categories->where('is_banner', true)->take(6);
        $categoriesFeature = $categories->where('is_featured', true)->take(5);


        return view('client.index', compact('categoriesNav', 'categoriesBanner', 'categoriesFeature'));
    }
}
