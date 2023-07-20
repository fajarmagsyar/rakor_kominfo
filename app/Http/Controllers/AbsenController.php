<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kegiatan;
use PDF;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        return view('admin.absen.index', [
            'pageTitle' => 'Absen',
            'absenRows' => Absen::join('users', 'users.user_id', '=', 'absen.user_id')->join('kegiatan', 'kegiatan.kegiatan_id', '=', 'absen.kegiatan_id')->where('absen.absensi', '=', '1')->get(['kegiatan.nama_kegiatan', 'users.nama', 'absen.status_peserta', 'absen.created_at', 'users.jabatan', 'users.asal']),
            'kegiatanRows' => Kegiatan::orderBy('nama_kegiatan', 'ASC')->get(),
        ]);
    }

    public function cetak_pdfsort($idkegiatan)
    {
        if ($idkegiatan == 'seluruh') {
            $absen = Absen::join('users', 'users.user_id', '=', 'absen.user_id')->join('kegiatan', 'kegiatan.kegiatan_id', '=', 'absen.kegiatan_id')->where('absen.absensi', '=', '1')->get(['kegiatan.nama_kegiatan', 'users.nama', 'absen.status_peserta', 'absen.created_at']);
        } else {
            $absen = Absen::join('users', 'users.user_id', '=', 'absen.user_id')->join('kegiatan', 'kegiatan.kegiatan_id', '=', 'absen.kegiatan_id')->where('absen.absensi', '=', '1')->where('kegiatan.kegiatan_id', $idkegiatan)->get(['kegiatan.nama_kegiatan', 'users.nama', 'absen.status_peserta', 'absen.created_at']);
        }
        $pdf = PDF::loadview('admin.absen.cetak_pdf_sort', ['absenRows' => $absen])->setpaper('A4', 'potrait');
        return $pdf->stream('laporan-absen-seluruh-pdf');
    }
}
