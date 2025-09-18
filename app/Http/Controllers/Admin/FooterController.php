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
        $footers = Footer::all();
        return view('admin.footers.index', compact('footers'));
    }

    public function create()
    {
        return view('admin.footers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $footer = Footer::create($request->all());
        return redirect()->back()->with('success', 'Footer thêm thành công');
    }

    public function update(Request $request, $id)
    {
        $logo = Account::find($id);
        $logo->is_active = $request->is_active;
        $logo->save();
        return redirect()->back()->with('success', 'Footer cập nhập thành công');
    }

    public function destroy($id)
    {
        $footer = Footer::find($id);
        $footer->delete();
        return redirect()->back()->with('success', 'Footer xóa thành công');
    }
}
