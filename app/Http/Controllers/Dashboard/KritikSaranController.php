<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Bagian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KritikSaranController extends Controller
{
    public function indexAdmin()
    {
        $bagian_id = DB::table('bagians')->where('role', Auth::user()->role)->value('id');

        $datas = Feedback::where('bagian_id', $bagian_id)->orderBy('created_at', 'desc')->get();


        return view('dashboard.kritik-saran.admin', compact('datas'));
    }

    public function indexMaster()
    {
        if (Auth::user()->role != 'superadmin') {
            return redirect()->route('dashboard');
        } else {
            $datas = Feedback::orderBy('created_at', 'desc')->get();

            return view('dashboard.kritik-saran.master', compact('datas'));
        }
    }
    public function detailKritikSaranMaster(Feedback $kritikSaran)
    {
        if (Auth::user()->role != 'superadmin') {
            return redirect()->route('dashboard');
        } else {

            return view('dashboard.kritik-saran.detail-master', compact('kritikSaran'));
        }
    }

}
