<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function absenMobile($id)
    {
        $kegiatan = Kegiatan::where('jam_masuk', '<=', date('H:i'))->where('jam_keluar', '>=', date('H:i'))->where('tanggal', '=', date('Y-m-d'))->first();
        $peserta = Absen::join('users', 'users.user_id', '=', 'absen.user_id')->where('absen.kegiatan_id', $kegiatan->kegiatan_id)->get(['users.nama', 'users.jabatan', 'users.asal']);
        // dd($peserta);
        $statusPeserta = "Peserta";
        $pesertaScanned = User::find($id);
        $checkExists = Absen::where('user_id', $id)->exists();
        if ($checkExists == false) {
            $statusPeserta = "Peserta Tambahan";
        }
        return view('scan.absen', [
            'pageTitle' => 'Absen Peserta',
            'kegiatan' => $kegiatan,
            'peserta' => $peserta,
            'pesertaScanned' => $pesertaScanned,
            'statusPeserta' => $statusPeserta,
        ]);
    }
    public function absenStore(Request $req)
    {
        $absen = Absen::where('kegiatan_id', $req->input('kegiatan_id'))->where('user_id', $req->input('user_id'))->exists();
        $absenData = Absen::where('kegiatan_id', $req->input('kegiatan_id'))->where('user_id', $req->input('user_id'))->first();


        if ($absen) {
            Absen::find($absenData->absen_id)->update(['absensi' => 1]);
            
            if ($absenData->absensi == 1) {
                return redirect('/scan/apeksi22/absen/' . $req->input('user_id'))->with('sudah', 'Peserta berhasil diabsen');
            }
        } else {
            $data = [
                'kegiatan_id' => $req->input('kegiatan_id'),
                'user_id' => $req->input('user_id'),
                'status_peserta' => 'Peserta Tambahan',
                'absensi' => 1,
            ];

            Absen::create($data);
        }

        return redirect('/scan/apeksi22/absen/' . $req->input('user_id'))->with('success', 'Peserta berhasil diabsen');
    }
}
