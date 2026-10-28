<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Footer::orderByDesc('id')->paginate(12);
        return view('admin.footers.index', compact('footers'));
    }

    public function create()
    {
        return view('admin.footers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:5000',
        ], [], ['content' => 'nội dung footer']);

        Footer::create($validated);

        return redirect()->back()->with('success', 'Thêm footer thành công');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:5000',
        ], [], ['content' => 'nội dung footer']);

        $footer = Footer::findOrFail($id);
        $footer->update($validated);

        return redirect()->back()->with('success', 'Cập nhật footer thành công');
    }

    public function destroy($id)
    {
        $footer = Footer::findOrFail($id);
        $footer->delete();

        return redirect()->back()->with('success', 'Xóa footer thành công');
    }
}
