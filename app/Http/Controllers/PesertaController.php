<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        return view('admin.peserta.index', [
            'pageTitle' => 'Peserta',
            'pesertarows'=> User::where('role_id') -> paginate(10)

        ]);

    }
    public function create()
    {
        //
        return view('admin.peserta.create', [
            'page' => 'Kegiatan | APEKSI',
            'pageTitle' => 'Tambah Peserta',


        ]);
    }

    public function store(Request $request)
    {

        $validateData=$request->validate(
            [
                'nama'=> 'required | size:8',
                'n'
            ]
        )

    }
}
