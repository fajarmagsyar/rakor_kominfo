<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
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
        return view('admin.kegiatan.index', [
            'page' => 'Data Kegiatan | APEKSI',
            'pageTitle' => 'Data Kegiatan',
            'kegiatanRows' => Kegiatan::orderBy('created_at', 'DESC')->paginate(10),
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
        return view('admin.kegiatan.create', [
            'page' => 'Kegiatan | APEKSI',
            'pageTitle' => 'Tambah Kegiatan',

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
        //

        // $this->authorize('root');
        // $rules = [
        //     'nama_kegiatan' => 'required',
        //     'tanggal' => 'required',
        //     'jam_masuk' => 'required',
        //     'jam_keluar' => 'required',
        //     'kuota' => 'required',
        //     'lokasi' => 'required',
        //     'long_lat' => 'required',
        //     'deskripsi' => 'required',
        // ];

        $input = [
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'tanggal' => $request->input('tanggal'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_keluar' => $request->input('jam_keluar'),
            'kuota' => $request->input('kuota'),
            'lokasi' => $request->input('lokasi'),
            'long_lat' => $request->input('long_lat'),
            'deskripsi' => $request->input('deskripsi'),

        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            // 'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            // 'unique' => '*Kolom :attribute sudah terdaftar.',
        ];
        // $validator = Validator::make($input, $rules, $messages);
        // if ($validator->fails()) {
        //     return redirect("/admin/kegiatan/create")->withErrors($validator)->withInput();
        // }
        $validator = Validator::make($input,  $messages);
        if ($validator->fails()) {
            return redirect("/admin/kegiatan/create")->withErrors($validator)->withInput();
        }
 $long=$request->input('long_lat') . "|". $request->input('lati_tude');
        $data = [
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'tanggal' => $request->input('tanggal'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_keluar' => $request->input('jam_keluar'),
            'kuota' => $request->input('kuota'),
            'lokasi' => $request->input('lokasi'),
            'long_lat' => $long,
            'deskripsi' => $request->input('deskripsi'),
        ];

        Kegiatan::create($data);

        return redirect('/admin/kegiatan')->with('success', 'Data berhasil ditambahkan');
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
        return view('admin.kegiatan.edit', [
            'page' => 'Edit Kegiatan | Gereja Moria',
            'pageTitle' => 'Edit Kegiatan',
            'data' => Kegiatan::where('kegiatan_id', $id)->first(),
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
        //
        // $rules = [
        //     'nama' => 'required',
        //     'no_hp' => 'required|numeric|digits_between:11,12',
        //     'judul' => 'required',
        //     'isi' => 'required',
        // ];

        $input = [
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'tanggal' => $request->input('tanggal'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_keluar' => $request->input('jam_keluar'),
            'kuota' => $request->input('kuota'),
            'lokasi' => $request->input('lokasi'),
            'long_lat' => $request->input('long_lat'),
            'deskripsi' => $request->input('deskripsi'),

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
            return redirect("/admin/kegiatan/$id/edit")->withErrors($validator)->withInput();
        }

        $long=$request->input('long_lat') . "|". $request->input('lati_tude');
        $data = [
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'tanggal' => $request->input('tanggal'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_keluar' => $request->input('jam_keluar'),
            'kuota' => $request->input('kuota'),
            'lokasi' => $request->input('lokasi'),
            'long_lat' => $long,
            'deskripsi' => $request->input('deskripsi'),
        ];

        Kegiatan::find($id)->update($data);

        return redirect('/admin/kegiatan')->with('success', 'Data berhasil diubah');
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
        Kegiatan::destroy($id);
        return redirect('/admin/kegiatan')->with('success', 'Data berhasil dihapus!');
    }
}