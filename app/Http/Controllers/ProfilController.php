<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profil.index', [
            'pageTitle' => 'Profil',
            'profilRow' => Profil::first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profil.create', [
            'pageTitle' => 'Edit Profil',
            'profilRow' => Profil::first(),
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
        $temp_berkas = $request->file('struktur')->getPathName();
        $ext = $request->file('struktur')->extension();
        $file_berkas = auth()->user()->user_id . '-' . 'struktur' . time();
        $folder_berkas = "unggah/profil/" . $file_berkas . "." . $ext;
        move_uploaded_file($temp_berkas, $folder_berkas);
        $struktur = '/unggah/profil/' . $file_berkas . "." . $ext;

        $data = [
            'visi' => $request->input('visi'),
            'misi' => $request->input('misi'),
            'nama' => $request->input('nama'),
            'sejarah' => $request->input('sejarah'),
            'struktur' => $struktur,
        ];

        Profil::find($request->input('profil_id'))->update($data);

        return redirect('/admin/profil')->with('success', 'Profil berhasil diubah');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
