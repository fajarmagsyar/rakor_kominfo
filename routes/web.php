<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\QRController;
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

Route::get('/galeri', [HomeController::class, 'galeri']);
Route::get('/evaluasi', [HomeController::class, 'evaluasi']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'signIn']);
Route::get('/logout', [AuthController::class, 'signOut']);

Route::get('/dewan-pengurus', [HomeController::class, 'dewanPengurus']);
Route::get('/sejarah', [HomeController::class, 'sejarah']);
Route::get('/visi-misi', [HomeController::class, 'visiMisi']);
Route::get('/lambang', [HomeController::class, 'lambang']);
Route::get('/kegiatan', [HomeController::class, 'kegiatan']);
Route::get('/kegiatan-single/{kegiatan_id}', [HomeController::class, 'kegiatanSingle']);
Route::get('/wisata', [HomeController::class, 'wisata']);
Route::get('/wisata-single/{fasilitas_id}', [HomeController::class, 'fasilitasSingle']);
Route::get('/hotel', [HomeController::class, 'hotel']);
Route::get('/hotel-single/{fasilitas_id}', [HomeController::class, 'fasilitasSingle']);
Route::get('/restoran', [HomeController::class, 'restoran']);
Route::get('/artikel', [HomeController::class, 'artikel']);
Route::get('/faskes', [HomeController::class, 'faskes']);
Route::get('/pusper', [HomeController::class, 'pusper']);
Route::get('/faskes-single/{fasilitas_id}', [HomeController::class, 'fasilitasSingle']);
Route::get('/pusper-single/{fasilitas_id}', [HomeController::class, 'fasilitasSingle']);
Route::get('/restoran-single', [HomeController::class, 'fasilitasSingle']);
Route::get('/restoran-single/{fasilitas_id}', [HomeController::class, 'fasilitasSingle']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/download-qr', [PesertaController::class, 'cetakPDFPesertaByNoHP']);

//REGISTRASI
Route::get('/registrasi', [PesertaController::class, 'registrasi']);
Route::get('/registrasi/edit/{id}', [PesertaController::class, 'registrasiEdit']);
Route::post('/registrasi/edit/{id}', [PesertaController::class, 'registrasiEditStore']);
Route::get('/registrasi-panitia', [PesertaController::class, 'registrasiPanitia']);
Route::get('/registrasi-panitia/edit/{id}', [PesertaController::class, 'registrasiPanitiaEdit']);
Route::post('/registrasi-panitia/edit/{id}', [PesertaController::class, 'registrasiEditStore']);
Route::get('/registrasi-result/{id}', [PesertaController::class, 'registrasiResult']);

Route::post('/updateKegiatanPeserta/{peserta}', [HomeController::class, 'updateKegiatan']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::resource('/profil', ProfilController::class);
    Route::resource('/artikel', ArtikelController::class);
    Route::resource('/absen', AbsenController::class);

    Route::resource('/kegiatan', KegiatanController::class);
    Route::resource('/fasilitas', FasilitasController::class);
    Route::resource('/peserta', PesertaController::class);
    Route::resource('/adm', AdmController::class);
    Route::resource('/galeri', GaleriController::class);

    Route::post('/peserta-panitia', [PesertaController::class, 'store']);

    Route::get('/peserta-kegiatan/{id}', [AdminController::class, 'pesertaKegiatan']);
    Route::get('/peserta-kegiatan/create/{id}', [AdminController::class, 'tambahPeserta']);
    Route::post('/peserta-kegiatan/store', [AdminController::class, 'pesertaStore']);
    Route::post('/peserta-kegiatan/destroy/{id}/{id_keg}', [AdminController::class, 'pesertaDestroy']);

    Route::get('qrCode', [QRController::class, 'generateQrCode']);
    Route::post('download-qr-code/{type}', 'QRController@downloadQRCode')->name('qrcode.download');

    Route::get('/cetak-absen/pdf/{idkegiatan}', [AbsenController::class, 'cetak_pdfsort']);
});


Route::get('/scan/apeksi22/absen/{peserta}', [ScanController::class, 'absenMobile']);
Route::post('/scan/apeksi22/absen/store', [ScanController::class, 'absenStore']);
Route::get('/admin/cetak-peserta/pdf/{id}', [PesertaController::class, 'cetakPDFPeserta']);
