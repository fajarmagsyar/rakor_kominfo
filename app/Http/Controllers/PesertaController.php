<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(User::join('roles', 'roles.role_id', '=', 'users.role_id')->where('roles.role_name', 'User')->get());
        return view('admin.peserta.index', [
            'pageTitle' => 'Peserta',
            'pesertaRows' => User::join('roles', 'roles.role_id', '=', 'users.role_id')->where('roles.role_name', 'User')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.peserta.create', [
            'pageTitle' => 'Tambah Peserta',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Roles::where('role_name', 'User')->first();
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'asal' => $request->input('asal'),
            'hp' => $request->input('no_hp'),
            'jabatan' => $request->input('jabatan'),
            'role_id' => $role->role_id,
        ];

        User::create($data);

        return redirect('/admin/peserta')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.peserta.edit', [
            'pageTitle' => 'Tambah Peserta',
            'peserta' => User::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Roles::where('role_name', 'User')->first();
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'asal' => $request->input('asal'),
            'hp' => $request->input('no_hp'),
            'jabatan' => $request->input('jabatan'),
            'role_id' => $role->role_id,
        ];

        User::find($id)->update($data);

        return redirect('/admin/peserta')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/peserta')->with('success', 'Data berhasil dihapus!');
    }
}
