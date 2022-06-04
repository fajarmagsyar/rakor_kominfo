<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(User::join('roles', 'roles.role_id', '=', 'users.role_id')->where('roles.role_name', 'User')->get());
        return view('admin.adm.index', [
            'pageTitle' => 'Admin',
            'pesertaRows' => User::join('roles', 'roles.role_id', '=', 'users.role_id')->where('roles.role_name', 'Admin')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adm.create', [
            'pageTitle' => 'Tambah Admin',
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
        $role = Roles::where('role_name', 'Admin')->first();
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'hp' => $request->input('no_hp'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $role->role_id,
        ];

        User::create($data);

        return redirect('/admin/adm')->with('success', 'Data berhasil ditambahkan!');
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
        return view('admin.adm.edit', [
            'pageTitle' => 'Edit Admin',
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
        $role = Roles::where('role_name', 'Admin')->first();
        $user = User::find($id);
        $pass = $user->password;
        if ($request->input('password')) {
            $pass = Hash::make($request->input('password'));
        }
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'hp' => $request->input('no_hp'),
            'password' => $pass,
            'role_id' => $role->role_id,
        ];

        User::find($id)->update($data);

        return redirect('/admin/adm')->with('success', 'Data berhasil diubah!');
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
        return redirect('/admin/adm')->with('success', 'Data berhasil dihapus!');
    }
}
