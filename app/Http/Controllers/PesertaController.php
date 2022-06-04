<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        return view('admin.peserta.index', [
            'pageTitle' => 'Peserta',
            'pesertaRows' => User::join('roles', 'roles.role_id', '=', 'users.role_id')->where('roles.role_name', 'User')->get(),
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


        $role = Roles::where('role_name','User')->first();

        $dt = [

            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'asal'  =>$request->input ('asal'),
            'hp' => $request->input('hp'),
            'role_id' => $role->role_id,
        ];


        User::create($dt);
        return redirect('/admin/peserta')->with('success', 'Data berhasil ditambahkan!');

    }


    public function edit($id)
    {
        return view('admin.peserta.edit', [
            'pageTitle' => 'Edit Peserta',
            'peserta' => User::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = Roles::where('role_name', 'User')->first();
        $user = User::find($id);

        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'asal'  =>$request->input ('asal'),
            'hp' => $request->input('hp'),
            'role_id' => $role->role_id,
        ];

        User::find($id)->update($data);

        return redirect('/admin/peserta')->with('success', 'Data berhasil diubah!');
    }



    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/peserta')->with('success', 'Data berhasil dihapus!');
    }

}
