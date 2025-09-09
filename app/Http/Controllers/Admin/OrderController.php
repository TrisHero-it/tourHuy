<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Tour;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query();
        if ($request->filled('search')) {
            $orders->where('phone', 'like', '%' . $request->search . '%');
        }
        $orders = $orders->with('tour')->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }
}
