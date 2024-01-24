<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\IndeksController;
use App\Http\Controllers\Dashboard\KuisionerController;
use App\Http\Controllers\Dashboard\JawabanController;
use App\Http\Controllers\Dashboard\BagianController;
use App\Http\Controllers\Dashboard\KritikSaranController;
use App\Http\Controllers\Dashboard\RespondenController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/kritik-saran', [HomeController::class, 'kritikSaran'])->name('kritik-saran');
Route::post('/kritik-saran', [HomeController::class, 'kritikSaranStore'])->name('kritik-saran.store');
Route::get('/kritik-saran/success', function () {
    return view('home.kritik-saran-success');
})->name('kritik-saran.success');


Route::get('/kuisioner-form', [HomeController::class, 'identitasKuisioner'])->name('identitas-kuisioner');
Route::post('/identitas-kuisioner', [HomeController::class, 'identitasKuisionerStore'])->name('identitas-kuisioner.store');

Route::get('/kuisioner/{id}/{user_id}/{current_index}', [HomeController::class, 'kuisioner'])->name('kuisioner');
Route::post('/kuisioner', [HomeController::class, 'kuisionerStore'])->name('kuisioner.store');
Route::get('/kuisioner/success', function () {
    return view('home.kuisioner-success');
})->name('kuisioner.success');

Route::get('/login-staff', [LoginController::class, 'index'])->name('login');
Route::post('/login-staff', [LoginController::class, 'store'])->name('login.store');

Route::post('/logout-staff', [LogoutController::class, 'logout'])->name('logout');

Route::get('/kosong', function () {
    return view('home.halaman-kosong');
})->name('kosong');

Route::group(['middleware' => ['auth']], function () {
    // dashboard
    Route::get('/dashboard-staff', [IndexController::class, 'index'])->name('dashboard');

    // dashboard indeks
    Route::get('/dashboard-staff/indeks', [IndeksController::class, 'index'])->name('dashboard.indeks.index');
    Route::post('/dashboard-staff/indeks', [IndeksController::class, 'store'])->name('dashboard.indeks.store');
    Route::get('/dashboard-staff/indeks/{indeks}/edit', [IndeksController::class, 'edit'])->name('dashboard.indeks.edit');
    Route::put('/dashboard-staff/indeks/{indeks}', [IndeksController::class, 'update'])->name('dashboard.indeks.update');
    Route::delete('/dashboard-staff/indeks/{indeks}', [IndeksController::class, 'destroy'])->name('dashboard.indeks.destroy');

    // dashboard kuisioner
    Route::get('/dashboard-staff/kuisioner', [KuisionerController::class, 'index'])->name('dashboard.kuisioner.index');
    Route::post('/dashboard-staff/kuisioner', [KuisionerController::class, 'store'])->name('dashboard.kuisioner.store');
    Route::get('/dashboard-staff/kuisioner/{kuisioner}/edit', [KuisionerController::class, 'edit'])->name('dashboard.kuisioner.edit');
    Route::put('/dashboard-staff/kuisioner/{kuisioner}', [KuisionerController::class, 'update'])->name('dashboard.kuisioner.update');
    Route::delete('/dashboard-staff/kuisioner/{kuisioner}', [KuisionerController::class, 'destroy'])->name('dashboard.kuisioner.destroy');

    // dashboard jawaban
    Route::get('/dashboard-staff/jawaban', [JawabanController::class, 'index'])->name('dashboard.jawaban.index');
    Route::post('/dashboard-staff/jawaban', [JawabanController::class, 'store'])->name('dashboard.jawaban.store');
    Route::get('/dashboard-staff/jawaban/{jawaban}/edit', [JawabanController::class, 'edit'])->name('dashboard.jawaban.edit');
    Route::put('/dashboard-staff/jawaban/{jawaban}', [JawabanController::class, 'update'])->name('dashboard.jawaban.update');
    Route::delete('/dashboard-staff/jawaban/{jawaban}', [JawabanController::class, 'destroy'])->name('dashboard.jawaban.destroy');

    // dashboard bagian
    Route::get('/dashboard-staff/bagian', [BagianController::class, 'index'])->name('dashboard.bagian.index');
    Route::post('/dashboard-staff/bagian', [BagianController::class, 'store'])->name('dashboard.bagian.store');
    Route::get('/dashboard-staff/bagian/{bagian}/edit', [BagianController::class, 'edit'])->name('dashboard.bagian.edit');
    Route::put('/dashboard-staff/bagian/{bagian}', [BagianController::class, 'update'])->name('dashboard.bagian.update');
    Route::delete('/dashboard-staff/bagian/{bagian}', [BagianController::class, 'destroy'])->name('dashboard.bagian.destroy');

    // dashboard kritik-saran admin
    Route::get('/dashboard-staff/laporan/admin', [KritikSaranController::class, 'indexAdmin'])->name('dashboard.kritik-saran.index.admin');

    // dashboard kritik-saran master
    Route::get('/dashboard-staff/laporan/master', [KritikSaranController::class, 'indexMaster'])->name('dashboard.kritik-saran.index.master');
    Route::get('/dashboard-staff/laporan/master/detail/{kritikSaran}', [KritikSaranController::class, 'detailKritikSaranMaster'])->name('dashboard.kritik-saran.detail.master');

    Route::post('/dashboard-staff/laporan/master/detail/{kritikSaran}', [KritikSaranController::class, 'storeStatus'])->name('dashboard.kritik-saran.store');

    // dashboard responden
    Route::get('/dashboard-staff/responden', [RespondenController::class, 'index'])->name('dashboard.responden.index');
    Route::get('/dashboard-staff/responden/detail/{responden}', [RespondenController::class, 'detailResponden'])->name('dashboard.responden.detail');
});
