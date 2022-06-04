<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        return view('admin.absen.index', [
            'pageTitle' => 'Absen',
            'absenRows' => Absen::join('users', 'users.user_id', '=' , 'absen.user_id')->join('kegiatan', 'kegiatan.kegiatan_id', '=' , 'absen.kegiatan_id')->get(),
        ]);
    }
}
