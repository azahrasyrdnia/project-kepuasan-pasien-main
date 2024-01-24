<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kuisioner;
use App\Models\Indek;

class KuisionerController extends Controller
{
    public function index()
    {
        //with relation
        $datas = Kuisioner::with('indeks')->get();
        $data_indeks = Indek::all();
        return view('dashboard.kuisioner.index', compact('datas', 'data_indeks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'indeks_id' => 'required'
        ]);

        Kuisioner::create([
            'judul' => $request->pertanyaan,
            'indeks_id' => $request->indeks_id,
        ]);

        return redirect()->route('dashboard.kuisioner.index')->with('success', 'Kuisioner berhasil ditambahkan');
    }

    public function edit(Kuisioner $kuisioner)
    {
        $data_indeks = Indek::all();
        return view('dashboard.kuisioner.edit', compact('kuisioner', 'data_indeks'));
    }

    public function update(Request $request, Kuisioner $kuisioner)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'indeks_id' => 'required'
        ]);

        $kuisioner->update([
            'judul' => $request->pertanyaan,
            'indeks_id' => $request->indeks_id,
        ]);

        return redirect()->route('dashboard.kuisioner.index')->with('success', 'Kuisioner berhasil diubah');
    }

    public function destroy(Kuisioner $kuisioner)
    {
        $kuisioner->delete();

        return redirect()->route('dashboard.kuisioner.index')->with('success', 'Kuisioner berhasil dihapus');
    }
}
