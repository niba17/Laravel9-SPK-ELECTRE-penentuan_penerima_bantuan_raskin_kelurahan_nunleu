<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KecamatanKelurahanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\KriteriaSubKriteriaController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\PendudukKriteriaController;
use App\Http\Controllers\PendudukSubKriteriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/akun', [AkunController::class, 'index'])->middleware('auth')->name('akun');
Route::get('/akun-add', [AkunController::class, 'create'])->middleware('auth')->name('akun-add');
Route::post('/akun-store', [AkunController::class, 'store'])->middleware('auth');
Route::get('/akun-edit/{id}', [AkunController::class, 'edit'])->middleware('auth')->name('akun-edit');
Route::put('/akun-update/{id}', [AkunController::class, 'update'])->middleware('auth');
Route::get('/akun-destroy/{id}', [AkunController::class, 'destroy'])->middleware('auth');

Route::get('/penduduk', [PendudukController::class, 'index'])->middleware('auth')->name('penduduk');
Route::get('/penduduk-add', [PendudukController::class, 'create'])->middleware('auth')->name('penduduk-add');
Route::post('/penduduk-store', [PendudukController::class, 'store'])->middleware('auth');
Route::get('/penduduk-edit/{id}', [PendudukController::class, 'edit'])->middleware('auth')->name('penduduk-edit');
Route::put('/penduduk-update/{id}', [PendudukController::class, 'update'])->middleware('auth');
Route::get('/penduduk-destroy/{id}', [PendudukController::class, 'destroy'])->middleware('auth');
Route::get('/penduduk-request', [PendudukController::class, 'request'])->name('penduduk-request');
// Route::get('/penduduk-cetak/{id}', [PendudukController::class, 'cetak']);

Route::get('/kriteria_sub_kriteria', [KriteriaSubKriteriaController::class, 'index'])->middleware('auth')->name('kriteria_sub_kriteria');
Route::get('/kriteria_sub_kriteria-add', [KriteriaSubKriteriaController::class, 'create'])->middleware('auth')->name('kriteria_sub_kriteria-add');
Route::post('/kriteria_sub_kriteria-store', [KriteriaSubKriteriaController::class, 'store'])->middleware('auth');
Route::get('/kriteria_sub_kriteria-edit/{id}', [KriteriaSubKriteriaController::class, 'edit'])->middleware('auth')->name('kriteria_sub_kriteria-edit');
Route::put('/kriteria_sub_kriteria-update/{id}', [KriteriaSubKriteriaController::class, 'update'])->middleware('auth');
Route::get('/kriteria_sub_kriteria-destroy/{id}', [KriteriaSubKriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/kriteria_sub_kriteria-request', [KriteriaSubKriteriaController::class, 'request'])->name('kriteria_sub_kriteria-request');

Route::get('/kriteria', [KriteriaController::class, 'index'])->middleware('auth')->name('kriteria');
Route::get('/kriteria-add', [KriteriaController::class, 'create'])->middleware('auth')->name('kriteria-add');
Route::post('/kriteria-store', [KriteriaController::class, 'store'])->middleware('auth');
Route::get('/kriteria-edit/{id}', [KriteriaController::class, 'edit'])->middleware('auth')->name('kriteria-edit');
Route::put('/kriteria-update/{id}', [KriteriaController::class, 'update'])->middleware('auth');
Route::get('/kriteria-destroy/{id}', [KriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/kriteria-request', [KriteriaController::class, 'request'])->name('kriteria-request');
Route::get('/kriteria_penduduk-request', [KriteriaController::class, 'request_penduduk'])->name('kriteria_penduduk-request');
// Route::get('/kriteria-cetak/{id}', [KriteriaController::class, 'cetak']);

Route::get('/sub_kriteria', [SubKriteriaController::class, 'index'])->middleware('auth')->name('sub_kriteria');
Route::get('/sub_kriteria-add', [SubKriteriaController::class, 'create'])->middleware('auth')->name('sub_kriteria-add');
Route::post('/sub_kriteria-validator_add', [SubKriteriaController::class, 'validator_add'])->middleware('auth');
Route::post('/sub_kriteria-store', [SubKriteriaController::class, 'store'])->middleware('auth');
Route::get('/sub_kriteria-edit/{id}', [SubKriteriaController::class, 'edit'])->middleware('auth')->name('sub_kriteria-edit');
Route::post('/sub_kriteria-validator_edit/{id}', [SubKriteriaController::class, 'validator_edit'])->middleware('auth');
Route::put('/sub_kriteria-update/{id}', [SubKriteriaController::class, 'update'])->middleware('auth');
Route::get('/sub_kriteria-destroy/{id}', [SubKriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/sub_kriteria-request', [SubKriteriaController::class, 'request'])->name('sub_kriteria-request');
// Route::get('/sub_kriteria-cetak/{id}', [SubKriteriaController::class, 'cetak']);

Route::get('/kecamatan_kelurahan', [KecamatanKelurahanController::class, 'index'])->middleware('auth')->name('kecamatan_kelurahan');
Route::get('/kecamatan_kelurahan-add', [KecamatanKelurahanController::class, 'create'])->middleware('auth')->name('kecamatan_kelurahan-add');
Route::post('/kecamatan_kelurahan-store', [KecamatanKelurahanController::class, 'store'])->middleware('auth');
Route::get('/kecamatan_kelurahan-edit/{id}', [KecamatanKelurahanController::class, 'edit'])->middleware('auth')->name('kecamatan_kelurahan-edit');
Route::put('/kecamatan_kelurahan-update/{id}', [KecamatanKelurahanController::class, 'update'])->middleware('auth');
Route::get('/kecamatan_kelurahan-destroy/{id}', [KecamatanKelurahanController::class, 'destroy'])->middleware('auth');
Route::get('/kecamatan_kelurahan-request', [KecamatanKelurahanController::class, 'request'])->name('kecamatan_kelurahan-request');

Route::get('/kecamatan', [KecamatanController::class, 'index'])->middleware('auth')->name('kecamatan');
Route::get('/kecamatan-add', [KecamatanController::class, 'create'])->middleware('auth')->name('kecamatan-add');
Route::post('/kecamatan-store', [KecamatanController::class, 'store'])->middleware('auth');
Route::get('/kecamatan-edit/{id}', [KecamatanController::class, 'edit'])->middleware('auth')->name('kecamatan-edit');
Route::put('/kecamatan-update/{id}', [KecamatanController::class, 'update'])->middleware('auth');
Route::get('/kecamatan-destroy/{id}', [KecamatanController::class, 'destroy'])->middleware('auth');
Route::get('/kecamatan-request', [KecamatanController::class, 'request'])->name('kecamatan-request');

Route::get('/kelurahan', [KelurahanController::class, 'index'])->middleware('auth')->name('kelurahan');
Route::get('/kelurahan-add', [KelurahanController::class, 'create'])->middleware('auth')->name('kelurahan-add');
Route::post('/kelurahan-store', [KelurahanController::class, 'store'])->middleware('auth');
Route::get('/kelurahan-edit/{id}', [KelurahanController::class, 'edit'])->middleware('auth')->name('kelurahan-add');
Route::put('/kelurahan-update/{id}', [KelurahanController::class, 'update'])->middleware('auth');
Route::get('/kelurahan-destroy/{id}', [KelurahanController::class, 'destroy'])->middleware('auth');

Route::get('/penduduk_kriteria', [PendudukKriteriaController::class, 'index'])->middleware('auth')->name('penduduk_kriteria');
Route::get('/penduduk_kriteria-add', [PendudukKriteriaController::class, 'create'])->middleware('auth')->name('penduduk_kriteria-add');
// Route::post('/penduduk_kriteria-validator_add', [PendudukKriteriaController::class, 'validator_add'])->middleware('auth');
Route::post('/penduduk_kriteria-store', [PendudukKriteriaController::class, 'store'])->middleware('auth');
Route::get('/penduduk_kriteria-edit/{id}', [PendudukKriteriaController::class, 'edit'])->middleware('auth')->name('penduduk_kriteria-edit');
// Route::post('/penduduk_kriteria-validator_edit/{id}', [PendudukKriteriaController::class, 'validator_edit'])->middleware('auth');
Route::put('/penduduk_kriteria-update/{id}', [PendudukKriteriaController::class, 'update'])->middleware('auth');
Route::get('/penduduk_kriteria-destroy/{id}', [PendudukKriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/penduduk_kriteria-request', [SubKriteriaController::class, 'penduduk_request'])->name('penduduk_kriteria-request');

Route::get('/penduduk_sub_kriteria', [PendudukSubKriteriaController::class, 'index'])->middleware('auth')->name('penduduk_sub_kriteria');
Route::get('/penduduk_sub_kriteria-add', [PendudukSubKriteriaController::class, 'create'])->middleware('auth')->name('penduduk_sub_kriteria-add');
Route::post('/penduduk_sub_kriteria-store', [PendudukSubKriteriaController::class, 'store'])->middleware('auth');
Route::get('/penduduk_sub_kriteria-edit/{id}', [PendudukSubKriteriaController::class, 'edit'])->middleware('auth')->name('penduduk_sub_kriteria-edit');
Route::put('/penduduk_sub_kriteria-update/{id}', [PendudukSubKriteriaController::class, 'update'])->middleware('auth');
Route::get('/penduduk_sub_kriteria-destroy/{id}', [PendudukSubKriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/penduduk_sub_kriteria-request', [SubKriteriaController::class, 'penduduk_request'])->name('penduduk_sub_kriteria-request');
Route::get('/penduduk_sub_kriteria-set/{id}', [PendudukSubKriteriaController::class, 'set'])->middleware('auth')->name('penduduk_sub_kriteria-set');
Route::put('/penduduk_sub_kriteria-apply/{id}', [PendudukSubKriteriaController::class, 'apply'])->middleware('auth')->name('penduduk_sub_kriteria-apply');

Route::get('/perhitungan-hasil', [PerhitunganController::class, 'hasil'])->middleware('auth')->name('perhitungan-hasil');

Route::get('/cetak-hasil', [PerhitunganController::class, 'cetak'])->middleware('auth')->name('cetak-hasil');