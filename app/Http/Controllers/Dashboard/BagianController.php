<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bagian;

class BagianController extends Controller
{
    public function index()
    {
        $datas = Bagian::all();
        return view('dashboard.bagian.index', compact('datas'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Bagian::create([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.bagian.index')->with('success', 'Bagian berhasil ditambahkan');
    }

    public function edit(Bagian $bagian)
    {
        return view('dashboard.bagian.edit', compact('bagian'));
    }

    public function update(Request $request, Bagian $bagian)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $bagian->update([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.bagian.index')->with('success', 'Bagian berhasil diubah');
    }

    public function destroy(Bagian $bagian)
    {
        $bagian->delete();

        return redirect()->route('dashboard.bagian.index')->with('success', 'Bagian berhasil dihapus');
    }
}
