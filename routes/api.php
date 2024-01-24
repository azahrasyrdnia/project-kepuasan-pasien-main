<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/api-rawat-inap-bagian', [HomeController::class, 'ApiRawatInapBagian'])->name('api.rawatInap-bagian');
Route::get('/api-rawat-jalan-bagian', [HomeController::class, 'ApiRawatJalanBagian'])->name('api.rawatJalan-bagian');


Route::get('/kuisioner-api', [HomeController::class, 'kuisionerApi'])->name('kuisioner.api');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
