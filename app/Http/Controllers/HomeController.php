<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bagian;
use App\Models\Indek;
use App\Models\Feedback;
use App\Models\Kuisioner;
use App\Models\IdentitasKuisioner;
use App\Models\Jawaban;
use App\Models\RespondenKuisioner;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function kritikSaran()
    {

        $data_indeks = Indek::all();
        return view('home.kritik-saran', compact('data_indeks'));
    }

    public function kritikSaranStore(Request $request)
    {
        $dt = new Carbon();
        $dt->TimeZone('Asia/Jakarta');
        $time_now = $dt->toDateTimeString();
        // get day month year from time stamp
        $day_now = date('d', strtotime($time_now));
        $month_now = date('m', strtotime($time_now));
        $year_now = date('Y', strtotime($time_now));

        $request->validate([
            'nama_lengkap' => 'required',
            'jenis_rawat' => 'required',
            'bagian' => 'required',
            'indikator' => 'required',
            'saran_kritik' => 'required',
        ]);

        Feedback::create([
            'name' => $request->nama_lengkap,
            'jenis_rawat' => $request->jenis_rawat,
            'saran_kritik' => $request->saran_kritik,
            'bagian_id' => $request->bagian,
            'indek_id' => $request->indikator,
            'created_at' => $time_now,
            'updated_at' => $time_now,
        ]);

        return redirect()->route('kritik-saran.success')->with('success', 'Kritik dan saran berhasil dikirim');
    }

    public function ApiRawatInapBagian()
    {
        if (DB::table('bagians')->count() > 0) {
            // cek data yang ada kata kunci pendafataran, farmasi, kasir, ruangan
            // cek apakah ada data dengan kata kunci tersebut
            if (DB::table('bagians')->whereIn('name', ['pendaftaran', 'farmasi', 'kasir', 'IGD', 'ICU', 'Ruang Perawatan', 'Fisiotherapy', 'Radiologi', 'HD' ])->get() != null) {
                // jika ada maka tampilkan data tersebut
                $data_bagians = DB::table('bagians')->whereIn('name', ['pendaftaran', 'farmasi', 'kasir', 'IGD', 'ICU', 'Ruang Perawatan', 'Fisiotherapy', 'Radiologi', 'HD'])->get();
                return response()->json([
                    'status' => 'success',
                    'data' => $data_bagians
                ]);
            } else {

                return response()->json([
                    'status' => 'tidak ada data',

                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data bagian tidak ditemukan'
            ]);
        }
    }

    public function ApiRawatJalanBagian()
    {
        if (DB::table('bagians')->count() > 0) {
            // cek data yang ada kata kunci pendafataran, farmasi, kasir, ruangan, IGD Laboratorium, Poli
            // cek apakah ada data dengan kata kunci tersebut
            if (DB::table('bagians')->whereIn('name', ['pendaftaran', 'farmasi', 'kasir', 'poliklinik','IGD', 'ICU', 'Ruang Perawatan', 'Fisiotherapy', 'Radiologi'])->get() != null) {
                // jika ada maka tampilkan data tersebut
                $data_bagian_rawat_jalan = DB::table('bagians')->whereIn('name', ['pendaftaran', 'farmasi', 'kasir', 'poliklinik', 'IGD', 'ICU', 'Ruang Perawatan', 'Fisiotherapy', 'Radiologi'])->get();
                return response()->json([
                    'status' => 'success',
                    'data' => $data_bagian_rawat_jalan
                ]);
            } else {

                return response()->json([
                    'status' => 'tidak ada data',
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data bagian tidak ditemukan'
            ]);
        }
    }

    public function identitasKuisioner()
    {
        return view('home.identitas-kuisioner');
    }

    public function identitasKuisionerStore(Request $request)
    {
        $dt = new Carbon();
        $dt->TimeZone('Asia/Jakarta');
        $time_now = $dt->toDateTimeString();
        // get day month year from time stamp
        $day_now = date('d', strtotime($time_now));
        $month_now = date('m', strtotime($time_now));
        $year_now = date('Y', strtotime($time_now));


        // cek apakah nomor telepon sudah ada atau belum
        if (IdentitasKuisioner::where('no_telepon', $request->nomor_telepon)->count() > 0) {
            return redirect()->route('kuisioner.success')->with('error', 'Nomor telepon sudah terdaftar, silahkan isi kuisioner dengan nomor telepon yang berbeda. Terima kasih');
        } else {
            if (Kuisioner::all()->count() == 0) {
                return back()->with('error', 'Tidak dapat lanjut. Data kuisioner tidak ditemukan / belum di inputkan');
            } else {
                $request->validate([
                    'nama_lengkap' => 'required',
                    'nomor_telepon' => 'required',
                    'jenis_rawat' => 'required',
                    'jenis_tanggungan' => 'required',
                ]);

                IdentitasKuisioner::create([
                    'nama_lengkap' => $request->nama_lengkap,
                    'no_telepon' => $request->nomor_telepon,
                    'jenis_rawat' => $request->jenis_rawat,
                    'jenis_tanggungan' => $request->jenis_tanggungan,
                    'created_at' => $time_now,
                    'updated_at' => $time_now,
                ]);


                $get_id = IdentitasKuisioner::where('no_telepon', $request->nomor_telepon)->get('id');
                $data_kuisioner_pertama = DB::table('kuisioners')->orderBy('indeks_id', 'asc')->first();

                // store session identitas kuisioner
                session([
                    'identitas_kuisioner_id' => $get_id[0]->id,
                ]);
                $current_index = 0;
                return redirect()->route('kuisioner', [$data_kuisioner_pertama->id, $get_id[0]->id, $current_index])->with('success', 'Identitas kuisioner berhasil disimpan');
            }
        }
    }

    public function kuisionerApi()
    {
        $data_kuisioner_id = DB::table('kuisioners')->orderBy('indeks_id', 'asc')->get('id');


        if ($data_kuisioner_id->count() > 0) {
            return response()->json([
                'status' => 'success',
                'data' => $data_kuisioner_id
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data indeks tidak ditemukan'
            ]);
        }
    }

    public function kuisioner($id, $user_id, $current_index)
    {

        $id_kuisioner = []; // length 6
        $data_kuisioner_id = DB::table('kuisioners')->orderBy('indeks_id', 'asc')->get('id');
        foreach ($data_kuisioner_id as $key => $value) {
            array_push($id_kuisioner, $value->id);
        }
        // cek apakah kuisioner ada atau tidak
        if (Kuisioner::all()->count() == 0) {
            return redirect()->route('kosong')->with('error', 'Kuisioner tidak ditemukan / belum di inputkan');
        } else {
            if (Kuisioner::find($id) == null) {
                return redirect()->route('kosong')->with('error', 'Kuisioner dengan id ' . $id . ' tidak ditemukan');
            } else {
                if (IdentitasKuisioner::find($user_id) == null) {
                    return redirect()->route('kosong')->with('error', 'Identitas kuisioner tidak di temukan');
                } else {
                    if (IdentitasKuisioner::find($user_id)->selesai_kuisioner == 'selesai') {
                        return redirect()->route('kuisioner.success')->with('error', 'Kuisioner sudah selesai di isi, silahkan isi kuisioner dengan Nomor Telepon yang berbeda. Terima kasih');
                    } else {
                        if (!isset($id_kuisioner[$current_index])) {
                            return back()->with('error', 'Kuisioner tidak ditemukan');
                        } else {
                            $data_kuisioner = Kuisioner::find($id);
                            $user_id = $user_id;
                            $current_index = $current_index;
                            $jawabans = Jawaban::all();

                            return view('home.kuisioner', compact('data_kuisioner', 'jawabans', 'user_id', 'current_index'));
                        }
                    }
                }
            }
        }
    }

    public function kuisionerStore(Request $request)
    {
        $dt = new Carbon();
        $dt->TimeZone('Asia/Jakarta');
        $time_now = $dt->toDateTimeString();
        // get day month year from time stamp
        $day_now = date('d', strtotime($time_now));
        $month_now = date('m', strtotime($time_now));
        $year_now = date('Y', strtotime($time_now));

        $current_index = $request->has('current_index') ? $request->input('current_index') : 0;
        $id_kuisioner = []; // length 6
        $data_kuisioner_id = DB::table('kuisioners')->orderBy('indeks_id', 'asc')->get('id');
        foreach ($data_kuisioner_id as $key => $value) {
            array_push($id_kuisioner, $value->id);
        }

        if (IdentitasKuisioner::find($request->identitas_kuisioner_id)->selesai_kuisioner == 'selesai') {
            return redirect()->route('kuisioner.success')->with('error', 'Kuisioner sudah selesai di isi, silahkan isi kuisioner dengan identitas yang berbeda. Terima kasih');
        } else {
            if (!isset($id_kuisioner[$current_index])) {
                return back()->with('error', 'Kuisioner tidak ditemukan');
            }
            // cek apakah kuisioner_id sudah di isi atau belum dengan identitas kuisioner_id sekarang
            if (RespondenKuisioner::where('kuisioner_id', $id_kuisioner[$current_index])->where('identitas_kuisioner_id', $request->identitas_kuisioner_id)->count() > 0) {
                return redirect()->route('kuisioner', [
                    'id' => $id_kuisioner[$current_index + 1],
                    'user_id' => $request->identitas_kuisioner_id,
                    'current_index' => $current_index + 1
                ])->with('error', 'Kuisioner sebelumnya tidak dapat diubah, Mohon dilanjutkan. Terima kasih');
            } else {
                $request->validate([
                    'identitas_kuisioner_id' => 'required',
                    'kuisioner_id' => 'required',
                    'jawaban_id' => 'required',
                ]);

                $skor = Jawaban::find($request->jawaban_id)->skor;

                // Inserting data into the database using $i for the current index
                RespondenKuisioner::create([
                    'identitas_kuisioner_id' => $request->identitas_kuisioner_id,
                    'kuisioner_id' => $id_kuisioner[$current_index],
                    'jawaban_id' => $request->jawaban_id,
                    'keluhan' => $request->keluhan,
                    'skor' => $skor,
                    'created_at' => $time_now,
                    'updated_at' => $time_now,
                ]);

                $panjang_id_kuisioner = count($id_kuisioner);

                $current_index++;

                if ($current_index < $panjang_id_kuisioner) {
                    return redirect()->route('kuisioner', [
                        'id' => $id_kuisioner[$current_index],
                        'user_id' => $request->identitas_kuisioner_id,
                        'current_index' => $current_index
                    ])->with('success', 'Kuisioner berhasil disimpan');
                } else {
                    $identitas_kuisioner = IdentitasKuisioner::find($request->identitas_kuisioner_id);
                    $identitas_kuisioner->selesai_kuisioner = 'selesai';
                    $updated_at = $time_now;
                    $identitas_kuisioner->updated_at = $updated_at;
                    $identitas_kuisioner->save();

                    $total_pertanyaan = Kuisioner::count();
                    $skor = RespondenKuisioner::where('identitas_kuisioner_id', $request->identitas_kuisioner_id)->sum('skor');

                    $caluculate_total_skor = intval($skor) / $total_pertanyaan * 25;
                    $total = intval($caluculate_total_skor);

                    $identitas_kuisioner->total_skor = $total;
                    $identitas_kuisioner->save();

                    return redirect()->route('kuisioner.success')->with('success', 'Kuisioner berhasil disimpan');
                }
            }
        }
    }
}
