<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indek;

class IndeksController extends Controller
{
    public function index()
    {
        $datas = Indek::all();
        return view('dashboard.indeks.index', compact('datas'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required'
        ]);

        Indek::create([
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('dashboard.indeks.index')->with('success', 'Indeks berhasil ditambahkan');
    }

    public function edit(Indek $indeks)
    {
        return view('dashboard.indeks.edit', compact('indeks'));
    }

    public function update(Request $request, Indek $indeks)
    {
        $request->validate([
            'jenis' => 'required'
        ]);

        $indeks->update([
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('dashboard.indeks.index')->with('success', 'Indeks berhasil diubah');
    }

    public function destroy(Indek $indeks)
    {
        $indeks->delete();

        return redirect()->route('dashboard.indeks.index')->with('success', 'Indeks berhasil dihapus');
    }
}
