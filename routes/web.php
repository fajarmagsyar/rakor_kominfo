<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ScanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'signIn']);
Route::get('/logout', [AuthController::class, 'signOut']);

Route::get('/dewan-pengurus', [HomeController::class, 'dewanPengurus']);
Route::get('/sejarah', [HomeController::class, 'sejarah']);
Route::get('/visi-misi', [HomeController::class, 'visiMisi']);
Route::get('/lambang', [HomeController::class, 'lambang']);

Route::get('/kegiatan', [HomeController::class, 'kegiatan']);
Route::get('/wisata', [HomeController::class, 'wisata']);
Route::get('/wisata-single', [HomeController::class, 'wisataSingle']);
Route::get('/hotel', [HomeController::class, 'hotel']);
Route::get('/hotel-single', [HomeController::class, 'hotelSingle']);
Route::get('/restoran', [HomeController::class, 'restoran']);
Route::get('/artikel', [ArtikelController::class, 'artikel']);
Route::get('/restoran-single', [HomeController::class, 'restoranSingle']);
Route::get('/contact', [HomeController::class, 'contact']);





Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', [AdminController::class, 'index']);

    Route::resource('/profil', ProfilController::class);
    Route::resource('/absen', AbsenController::class);
    Route::resource('/kegiatan', KegiatanController::class);

    Route::resource('/peserta', PesertaController::class);

    Route::resource('/adm', AdmController::class);
    Route::get('/peserta-kegiatan/{id}', [AdminController::class, 'pesertaKegiatan']);
    Route::get('/peserta-kegiatan/create/{id}', [AdminController::class, 'tambahPeserta']);
    Route::post('/peserta-kegiatan/store', [AdminController::class, 'pesertaStore']);
    Route::post('/peserta-kegiatan/destroy/{id}/{id_keg}', [AdminController::class, 'pesertaDestroy']);
});


Route::get('/scan/apeksi22/absen/{peserta}', [ScanController::class, 'absenMobile']);
Route::post('/scan/apeksi22/absen/store', [ScanController::class, 'absenStore']);
