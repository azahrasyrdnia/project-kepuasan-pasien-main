<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kuisioner;
use App\Models\IdentitasKuisioner;
use App\Models\RespondenKuisioner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RespondenController extends Controller
{
    public function index()
    {
        // ambil semua data responden tanpa filter sudah selesai atau belum
        // $datas = IdentitasKuisioner::orderBy('created_at', 'desc')->get();

        // ambil semua data responden dengan filter sudah selesai
        $datas = IdentitasKuisioner::where('selesai_kuisioner', 'selesai')->orderBy('created_at', 'asc')->get();


        return view('dashboard.responden.index', compact('datas'));
    }

    public function detailResponden($id)
    {

        $total_pertanyaan = Kuisioner::count();


        $respondens = RespondenKuisioner::where('identitas_kuisioner_id', $id)->get();

        $skor = RespondenKuisioner::where('identitas_kuisioner_id', $id)->sum('skor');

        $caluculate_total_skor = intval($skor) / $total_pertanyaan * 25;
        $total = intval($caluculate_total_skor);

        return view('dashboard.responden.detail', compact('respondens', 'total'));
    }
}
