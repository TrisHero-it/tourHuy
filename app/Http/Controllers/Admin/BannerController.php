<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/banners'), $imageName);
            $banner = Banner::create([
                'image' => "images/banners/" . $imageName,
                'status' => 'active',
            ]);
        }
        return redirect()->back()->with('success', 'Banner thêm thành công');
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $banner->status = $request->status;
        $banner->save();
        return redirect()->back()->with('success', 'Banner cập nhập thành công');
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect()->back()->with('success', 'Banner xóa thành công');
    }
}
