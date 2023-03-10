<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Fasilitas;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('Admin');
        return view('admin.index', [
            'pageTitle' => 'Dashboard',
            'totalKegiatan' => Kegiatan::count(),
            'totalPeserta' => User::join('roles', 'roles.role_id', '=', 'users.role_id')->count(),
            'totalFasilitas' => Fasilitas::count(),
        ]);
    }

    public function pesertaKegiatan($id)
    {
        $this->authorize('Admin');
        $keg = Kegiatan::find($id);
        $peserta = Absen::join('users', 'users.user_id', '=', 'absen.user_id')->where('absen.kegiatan_id', $id)->get(['users.nama', 'users.jabatan', 'users.asal', 'absen.absen_id']);
        return view('admin.peserta-kegiatan.index', [
            'pageTitle' => 'Peserta Kegiatan',
            'kegiatan' => $keg,
            'peserta' => $peserta,
        ]);
    }
    // [['absen.kegiatan_id', '!=', $id], ['absen.kegiatan_id', '!=', NULL]]
    public function tambahPeserta($id)
    {
        $this->authorize('Admin');
        $keg = Kegiatan::find($id);
        $peserta = Absen::rightJoin('users', 'users.user_id', '=', 'absen.user_id')
            ->join('roles', 'roles.role_id', '=', 'users.role_id')
            ->where('roles.role_name', 'User')
            ->where(function ($query) use ($id) {
                $query->where('absen.kegiatan_id', '!=', $id)->orWhere('absen.kegiatan_id', '=', NULL);
            })
            ->get();
        return view('admin.peserta-kegiatan.create', [
            'pageTitle' => 'Peserta Kegiatan',
            'kegiatan' => $keg,
            'peserta' => $peserta,
        ]);
    }
    public function pesertaStore(Request $req)
    {
        $data = [
            'user_id' => $req->input('user_id'),
            'kegiatan_id' => $req->input('kegiatan_id'),
            'absensi' => 0,
            'status_peserta' => 'Peserta'
        ];
        Absen::create($data);
        return redirect('/admin/peserta-kegiatan/' . $req->input('kegiatan_id'))->with('success', 'Peserta berhasil ditambah');
    }
    public function pesertaDestroy($id, $id_keg)
    {
        Absen::destroy($id);
        return redirect('/admin/peserta-kegiatan/' . $id_keg)->with('success', 'Peserta berhasil ditambah');
    }
}
