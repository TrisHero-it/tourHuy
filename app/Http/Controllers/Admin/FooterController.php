<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Account::all();
        return view('admin.footers.index', compact('footers'));
    }

    public function create()
    {
        return view('admin.footers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        Account::where('is_active', 1)->update(['is_active' => 0]);
        $footer = Account::create($request->all());
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
        $footer = Account::find($id);
        $footer->delete();
        return redirect()->back()->with('success', 'Footer xóa thành công');
    }
}
