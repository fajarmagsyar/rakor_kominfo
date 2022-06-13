<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use File;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeris= Galeri::all();
        return view('admin.galeri.index', [
            'pageTitle' => 'Galeri',
            'galeri' => $galeris,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.create', [
            'page' => 'Fasilitas | APEKSI',
            'rowsKategori' => ['Praker', 'Raker'],
            'pageTitle' => 'Tambah Apeksi',

        ]);
    }


    public function show($id)
    {

    }


    public function store(Request $request)
    {
           $rules = [

            'kategori' => 'required',
            'foto' => 'file|mimes:png,jpg,jpeg|max:1000',

        ];

        $input = [
            'kategori' => $request->input('kategori'),
             'foto' => $request->file('foto'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max.',
            'mimes' => '*Format file :attribute tidak didukung.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/admin/galeri/create')->withErrors($validator)->withInput();
        }

        // Upload Foto
         $temp_foto= $request->file('foto')->getPathName();
         $file_foto= $request->input('foto') . "-Foto-galeri-" . time();
         $folder_foto= "unggah/galeri/" . $file_foto. ".jpg";
         move_uploaded_file($temp_foto, $folder_foto);
         $name_foto= '/unggah/galeri/' . $file_foto. '.jpg';
         $long=$request->input('long_lat') . "|". $request->input('lati_tude');
        $data = [
            'kategori' => $request->input('kategori'),
            'foto' => $name_foto,
        ];

        Galeri::create($data);

        return redirect('/admin/galeri/')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        //
        //
        return view('admin.galeri.edit', [
            'page' => 'Edit Galeri',
            'rowsKategori' => ['Praker', 'Raker'],
            'pageTitle' => 'Edit Galeri',
            'data' => Galeri::where('galeri_id', $id)->first(),
        ]);
    }



    public function update(Request $request, $id)
    {
        $galeri=$request->file('foto') ? 'file|mimes:png,jpg,jpeg|max:2000':'';
        $rules = [

        'kategori' => 'required',
        'foto' => $galeri,

        ];

        $input = [
            'kategori' => $request->input('kategori'),
            'foto' => $request->file('foto'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max.',
            'mimes' => '*Format file :attribute tidak didukung.',

        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect("/admin/galeri/$id/edit")->withErrors($validator)->withInput();
        }

        $foto = Galeri::where('galeri_id', $request->input('galeri_id'))->first();
        $path_foto = $foto['foto'];
        if ($request->file('foto')) {
            File::delete(public_path($path_foto));
            $ext_foto = $request->file('foto')->getClientOriginalExtension();
            $next_foto = explode("/", $path_foto);
            $newFile_foto = end($next_foto);
            $temp_foto = $request->file('foto')->getPathName();
            $folder_foto = "unggah/galeri/" . $newFile_foto;
            move_uploaded_file($temp_foto, $folder_foto);
            $path_foto = "/unggah/galeri/" . $newFile_foto;
        }
        $long=$request->input('long_lat') . "|". $request->input('lati_tude');
        $data = [
            'kategori' => $request->input('kategori'),
            'foto' => $path_foto,
        ];

        Galeri::find($id)->update($data);

        return redirect('/admin/galeri')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy(Request $request)
    {

        $gambar = Galeri::where('galeri_id',$request->input('galeri_id'))->first();
        File::delete(public_path($gambar['foto']));
        Galeri::destroy($request->input('galeri_id'));
        return redirect('/admin/galeri')->with('success', 'Data berhasil dihapus!');
    }


}
