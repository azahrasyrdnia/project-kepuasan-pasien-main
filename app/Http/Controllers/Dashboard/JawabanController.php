<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jawaban;

class JawabanController extends Controller
{
    public function index()
    {
        $datas = Jawaban::all();
        return view('dashboard.jawaban.index', compact('datas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jawaban' => 'required',
        ]);

        Jawaban::create([
            'name' => $request->jawaban,

        ]);

        return redirect()->route('dashboard.jawaban.index')->with('success', 'Jawaban berhasil ditambahkan');
    }

    public function edit(Jawaban $jawaban)
    {
        return view('dashboard.jawaban.edit', compact('jawaban'));
    }

    public function update(Request $request, Jawaban $jawaban)
    {
        $request->validate([
            'jawaban' => 'required',

        ]);

        $jawaban->update([
            'name' => $request->jawaban,

        ]);

        return redirect()->route('dashboard.jawaban.index')->with('success', 'Jawaban berhasil diubah');
    }

    public function destroy(Jawaban $jawaban)
    {
        $jawaban->delete();

        return redirect()->route('dashboard.jawaban.index')->with('success', 'Jawaban berhasil dihapus');
    }
}
