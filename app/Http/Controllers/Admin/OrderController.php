<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $tours = Tour::all();
        return view('admin.tours.index', compact('tours'));
    }
}
