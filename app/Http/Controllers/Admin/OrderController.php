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

        if ($request->filled('status')) {
            $orders->where('status', $request->status);
        }

        $orders = $orders->with('tour')->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }
}
