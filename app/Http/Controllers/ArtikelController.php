<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        return view('admin.artikel.index', [
            'page' => 'Data Artikel | APEKSI',
            'pageTitle' => 'Data Artikel',
            'artikelRows' => Artikel::join('users', 'users.user_id', '=', 'artikel.user_id')
            ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artikel.create', [
            'pageTitle' => 'Tambah Artikel',
            'rowsArtikel' => User::latest()->get(),
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
        $input = [
            'user_id' => $request->input('user_id'),
            'isi' => $request->input('isi'),
            
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            // 'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            // 'unique' => '*Kolom :attribute sudah terdaftar.',
        ];
        
        $validator = Validator::make($input,  $messages);
        if ($validator->fails()) {
            return redirect("/admin/artikel/create")->withErrors($validator)->withInput();
        }
        $data = [
            'user_id' => $request->input('user_id'),
            'isi' => $request->input('isi'),
           
        ];
        Artikel::create($data);


        return redirect('/admin/artikel')->with('success', 'Artikel berhasil diubah');
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
        return view('admin.artikel.edit', [
            'page' => 'Edit Artikel | Apeksi',
            'pageTitle' => 'Edit Artikel',
            'data' => Artikel::join('users', 'users.user_id', '=', 'artikel.user_id' )-git >where('artikel_id',$id)->first(),
            'rowsArtikel' => User::latest()->get()
        ]);
        return redirect('/admin/artikel')->with('success', 'Artikel berhasil diubah');
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
        // $rules = [
        //     'nama' => 'required',
        //     'no_hp' => 'required|numeric|digits_between:11,12',
        //     'judul' => 'required',
        //     'isi' => 'required',
        // ];

        $input = [
            'user_id' => $request->input('user_id'),
            'isi' => $request->input('isi'),
           

        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            // 'unique' => '*Kolom :attribute sudah terdaftar.',
        ];
        // $validator = Validator::make($input, $rules, $messages);
        // if ($validator->fails()) {
        //     return redirect("/admin/kegiatan/$id/edit")->withErrors($validator)->withInput();
        // }
        $validator = Validator::make($input, $messages);
        if ($validator->fails()) {
            return redirect("/admin/artikel/$id/edit")->withErrors($validator)->withInput();
        }


        $data = [
            'user_id' => $request->input('user_id'),
            'isi' => $request->input('isi'),
            
        ];

        Artikel::find($id)->update($data);

        return redirect('/admin/artikel')->with('success', 'Data berhasil diubah');
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
        //
        Artikel::destroy($id);
        return redirect('/admin/artikel')->with('success', 'Data berhasil dihapus!');
    }
}
