<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display tour detail
     */
    public function show($categorySlug, $tourSlug)
    {
        // Tìm category cha theo slug
        $category = Category::where('slug', $categorySlug)
            ->where('status', 'active')
            ->first();
            
        if (!$category) {
            abort(404, 'Category not found');
        }

        // Tìm tour theo slug và thuộc category này
        $tour = Tour::where('slug', $tourSlug)
            ->where('category_id', $category->id)
            ->where('status', 'active')
            ->with(['category', 'categoryChild'])
            ->first();
            
        if (!$tour) {
            abort(404, 'Tour not found');
        }

        return view('client.tour.detail', compact('category', 'tour'));
    }
}
