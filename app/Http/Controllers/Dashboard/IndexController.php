<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indek;
use App\Models\Kuisioner;
use App\Models\Feedback;
use App\Models\RespondenKuisioner;
use App\Models\IdentitasKuisioner;
use App\Models\Jawaban;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {

        $dt = new Carbon();
        $dt->TimeZone('Asia/Jakarta');
        $time_now = $dt->toDateTimeString();
        // get day month year from time stamp
        $day_now = date('d', strtotime($time_now));
        $month_now = date('m', strtotime($time_now));
        $year_now = date('Y', strtotime($time_now));


        // ================================================================
        // Grafik per hari
        // filter responden yang sudah selesai dan tanggal sekarang (today) dari tabel identitas_kuisioner

        for ($i = $day_now; $i >= 1; $i--) {
            $total_responden_tanggal_sekarang = DB::table('identitas_kuisioners')->where('selesai_kuisioner', 'selesai')->whereDay('created_at', $i)->whereMonth('created_at', $month_now)->whereYear('created_at', $year_now)->count();
            $skor_total_tanggal_sekarang = DB::table('identitas_kuisioners')->where('selesai_kuisioner', 'selesai')->whereDay('created_at', $i)->whereMonth('created_at', $month_now)->whereYear('created_at', $year_now)->sum('total_skor');

            //divide by zero
            if ($total_responden_tanggal_sekarang != 0) {
                $skor_total_hari_ini[$i] = $skor_total_tanggal_sekarang / $total_responden_tanggal_sekarang;
            } else {
                $skor_total_hari_ini[$i] = 0;
            }
            $tanggal[$i] = $i;
        }

        // ===========================================================================================================
        // Grafik jenis rawat

        $rawat_jalan = IdentitasKuisioner::where('selesai_kuisioner', 'selesai')->where('jenis_rawat', 'Rawat-Jalan')->count();
        $rawat_inap = IdentitasKuisioner::where('selesai_kuisioner', 'selesai')->where('jenis_rawat', 'Rawat-Inap')->count();
        $IGD = IdentitasKuisioner::where('selesai_kuisioner', 'selesai')->where('jenis_rawat', 'IGD')->count();

        // ===========================================================================================================
        // Grafik jenis Tanggungan

        $tanggungan_bpjs = IdentitasKuisioner::where('selesai_kuisioner', 'selesai')->where('jenis_tanggungan', 'BPJS')->count();
        $tanggungan_pribadi = IdentitasKuisioner::where('selesai_kuisioner', 'selesai')->where('jenis_tanggungan', 'pribadi')->count();
        $tanggungan_asuransi = IdentitasKuisioner::where('selesai_kuisioner', 'selesai')->where('jenis_tanggungan', 'asuransi')->count();

        // ===========================================================================================================
        // kuisioner

        // filter responden yang sudah selesai
        $responden = IdentitasKuisioner::where('selesai_kuisioner', 'selesai')->count();
        if ($responden != 0) {
            $skor_total = IdentitasKuisioner::where('selesai_kuisioner', 'selesai')->sum('total_skor');
            $skor_total = $skor_total / $responden;
        } else {
            $skor_total = 0;
        }


        $total_skor_kuisioner = number_format($skor_total, 2, ',', '.');
        // tanpa filter responden yang sudah selesai
        // $identitas = IdentitasKuisioner::all()->count();


        // ================================================================
        // laporan
        if (Auth::user()->role == 'superadmin') {
            $feedback = Feedback::orderBy('created_at', 'desc')->count();
        } else {
            // get bagian_id (rol)
            $bagian_id = DB::table('bagians')->where('role', Auth::user()->role)->value('id');
            $feedback = Feedback::where('bagian_id', $bagian_id)->orderBy('created_at', 'desc')->count();
        }
        return view('dashboard.index', compact('responden', 'feedback', 'skor_total_hari_ini', 'tanggal', 'total_skor_kuisioner', 'rawat_jalan', 'rawat_inap','IGD', 'tanggungan_bpjs', 'tanggungan_pribadi', 'tanggungan_asuransi'));
    }
}
