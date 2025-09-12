<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GoogleMap;
use Illuminate\Http\Request;

class GoogleMapController extends Controller
{
    public function index()
    {
        $googleMaps = GoogleMap::orderByDesc('id')->paginate(12);
        return view('admin.google-maps.index', compact('googleMaps'));
    }

    public function create()
    {
        return view('admin.google-maps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'map_url' => 'required',

        ]);
        GoogleMap::where('status', 'active')->update([
            'status' => 'inactive',
        ]);

        GoogleMap::create([
            'name' => $request->name,
            'address' => $request->address,
            'map_url' => $request->map_url,
            'status' => 'active',
        ]);

        return redirect()->back()->with('success', 'Thêm Google Map thành công');
    }

    public function edit($id)
    {
        $map = GoogleMap::findOrFail($id);
        return view('admin.google-maps.edit', compact('map'));
    }

    public function update(Request $request, $id)
    {

        $map = GoogleMap::findOrFail($id);
        $map->update($request->all());

        return redirect()->route('admin.google-maps.index')->with('success', 'Cập nhật Google Map thành công');
    }

    public function destroy($id)
    {
        $map = GoogleMap::findOrFail($id);
        $map->delete();
        return redirect()->back()->with('success', 'Xóa Google Map thành công');
    }

    public function changeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);
        $map = GoogleMap::findOrFail($id);
        $map->status = $request->status;
        $map->save();
        return response()->json(['success' => true]);
    }
}
