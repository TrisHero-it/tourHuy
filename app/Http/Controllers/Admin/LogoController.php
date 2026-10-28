<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::orderByDesc('id')->paginate(12);
        return view('admin.logos.index', compact('logos'));
    }

    public function create()
    {
        return view('admin.logos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg',
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
        $validated = $request->validate([
            'status' => 'required|in:active,inactive',
        ], [], ['status' => 'trạng thái']);

        $logo = Logo::findOrFail($id);
        $logo->status = $validated['status'];
        $logo->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái logo thành công');
    }

    public function destroy($id)
    {
        $logo = Logo::findOrFail($id);

        // Delete the image file from storage
        if ($logo->image && file_exists(public_path($logo->image))) {
            @unlink(public_path($logo->image));
        }

        $logo->delete();

        return redirect()->back()->with('success', 'Xóa logo thành công');
    }
}
