<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryChild;
use App\Models\Tour;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display category by slug
     */
    public function show($slug)
    {
        // Tìm category theo slug
        $category = Category::where('slug', $slug)->first();
        
        if (!$category) {
            abort(404, 'Category not found');
        }

        // Lấy các category child của category này
        $categoryChildren = $category->categoryChild()->get();

        // Lấy các tour thuộc category này
        $tours = Tour::where('category_id', $category->id)
            ->where('status', 'active')
            ->paginate(12);

        return view('client.category.category', compact('category', 'categoryChildren', 'tours'));
    }

    /**
     * Display category child by slug
     */
    public function showChild($categorySlug, $childSlug)
    {
        // Tìm category cha
        $category = Category::where('slug', $categorySlug)->first();
        
        if (!$category) {
            abort(404, 'Category not found');
        }

        // Tìm category child
        $categoryChild = $category->categoryChild()
            ->where('slug', $childSlug)
            ->where('status', 'active')
            ->first();
            
        if (!$categoryChild) {
            abort(404, 'Category child not found');
        }

        // Lấy các tour thuộc category child này
        $tours = Tour::where('category_id', $category->id)
            ->where('status', 'active')
            ->paginate(12);

        return view('client.category.category-child', compact('category', 'categoryChild', 'tours'));
    }

    /**
     * Display all categories
     */
    public function index()
    {
        $categories = Category::where('status', 'active')
            ->with('categoryChild')
            ->get();

        return view('client.category.index', compact('categories'));
    }
}
