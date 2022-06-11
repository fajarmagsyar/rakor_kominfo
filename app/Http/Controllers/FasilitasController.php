<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
class FasilitasController extends Controller
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
        return view('admin.fasilitas.index', [
            'page' => 'Data Fasilitas | APEKSI',
            'pageTitle' => 'Data Fasilitas',
            'fasilitasRows' => Fasilitas::orderBy('created_at', 'DESC')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.fasilitas.create', [
            'page' => 'Fasilitas | APEKSI',
            'rowsKategori' => ['Hotel', 'Restaurant', 'Wisata'],
            'pageTitle' => 'Tambah Fasilitas',

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
           $rules = [

            'kategori' => 'required',

            'nama_fasilitas' => 'required|unique:fasilitas',
            'deskripsi' => 'required|unique:fasilitas',
            'lokasi' => 'required|unique:fasilitas',
            'long_lat' => 'required|unique:fasilitas',
            'foto' => 'file|mimes:png,jpg,jpeg|max:1000',

        ];

        $input = [
            'kategori' => $request->input('kategori'),
            'nama_fasilitas' => $request->input('fasilitas'),
            'deskripsi' => $request->input('deskripsi'),
            'lokasi' => $request->input('lokasi'),
            'long_lat' => $request->input('long_lat'),
            'long_lat' => $request->input('long_lat','|','lati_tude'),
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
            return redirect('/admin/fasilitas/create')->withErrors($validator)->withInput();
        }

        // Upload Foto
         $temp_foto= $request->file('foto')->getPathName();
         $file_foto= $request->input('foto') . "-Foto-Fasilitas-" . time();
         $folder_foto= "unggah/fasilitas/" . $file_foto. ".jpg";
         move_uploaded_file($temp_foto, $folder_foto);
         $name_foto= '/unggah/fasilitas/' . $file_foto. '.jpg';
         $long=$request->input('long_lat') . "|". $request->input('lati_tude');
        $data = [
            'kategori' => $request->input('kategori'),
            'nama_fasilitas' => $request->input('fasilitas'),
            'deskripsi' => $request->input('deskripsi'),
            'lokasi' => $request->input('lokasi'),
            'long_lat' => $long,
            'foto' => $name_foto,
        ];

        Fasilitas::create($data);

        return redirect('/admin/fasilitas/')->with('success', 'Data Berhasil Ditambahkan!');

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
        //
        return view('admin.fasilitas.edit', [
            'page' => 'Edit Fasilitas | Gereja Moria',
            'rowsKategori' => ['Hotel', 'Restaurant', 'Wisata'],
            'pageTitle' => 'Edit Fasilitas',
            'data' => Fasilitas::where('fasilitas_id', $id)->first(),
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
         $foto_fasilitas=$request->file('foto') ? 'file|mimes:png,jpg,jpeg|max:2000':'';
        $rules = [

          'kategori' => 'required',
            'nama_fasilitas' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'long_lat' => 'required',
            'foto' => $foto_fasilitas,

        ];

        $input = [
            'kategori' => $request->input('kategori'),
            'nama_fasilitas' => $request->input('fasilitas'),
            'deskripsi' => $request->input('deskripsi'),
            'lokasi' => $request->input('lokasi'),
            'long_lat' => $request->input('long_lat'),

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
            return redirect("/admin/fasilitas/$id/edit")->withErrors($validator)->withInput();
        }

        $foto = Fasilitas::where('fasilitas_id', $request->input('fasilitas_id'))->first();

        $path_foto = $foto['foto'];
        if ($request->file('foto')) {
            File::delete(public_path($path_foto));
            $ext_foto = $request->file('foto')->getClientOriginalExtension();
            $next_foto = explode("/", $path_foto);
            $newFile_foto = end($next_foto);
            $temp_foto = $request->file('foto')->getPathName();
            $folder_foto = "unggah/fasilitas/" . $newFile_foto;
            move_uploaded_file($temp_foto, $folder_foto);
            $path_foto = "/unggah/fasilitas/" . $newFile_foto;
        }
        $long=$request->input('long_lat') . "|". $request->input('lati_tude');
        $data = [
           'kategori' => $request->input('kategori'),
            'nama_fasilitas' => $request->input('fasilitas'),
            'deskripsi' => $request->input('deskripsi'),
            'lokasi' => $request->input('lokasi'),
            'long_lat' => $long,

            'foto' => $path_foto,
        ];

        Fasilitas::find($id)->update($data);

        return redirect('/admin/fasilitas')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        //
       $fasilitas = Fasilitas::where('fasilitas_id', $request->input('fasilitas_id'))->first();
        File::delete(public_path($fasilitas['foto']));
        Fasilitas::destroy($request->input('fasilitas_id'));
        return redirect('/admin/fasilitas')->with('success', 'Data berhasil dihapus!');
    }
}
