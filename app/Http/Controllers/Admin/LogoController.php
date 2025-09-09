<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::all();
        return view('admin.logos.index', compact('logos'));
    }

    public function create()
    {
        return view('admin.logos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/logos'), $imageName);
            $logo = Logo::create([
                'image' => "images/logos/" . $imageName,
                'status' => 'active',
            ]);
        }
        return redirect()->back()->with('success', 'Logo thêm thành công');
    }


    public function update(Request $request, $id)
    {
        $logo = Logo::find($id);
        $logo->status = $request->status;
        $logo->save();
        return redirect()->back()->with('success', 'Logo cập nhập thành công');
    }

    public function destroy($id)
    {
        $logo = Logo::find($id);
        
        // Delete the image file from storage
        if ($logo && file_exists(public_path($logo->image))) {
            unlink(public_path($logo->image));
        }
        
        $logo->delete();
        return redirect()->back()->with('success', 'Logo đã được xóa thành công');
    }
}
