<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::with('category', 'categoryChild')->paginate(12);
        return view('admin.tours.index', compact('tours'));
    }
}
