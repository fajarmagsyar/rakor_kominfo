<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use PDF;
use File;

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


        $role = Roles::where('role_name', 'User')->first();


        $rules = [


            'nama'      =>  'required',
            'jabatan'   =>  'required',
            'email'     =>  'email | required',
            'asal'      =>  'required',
            'hp'        =>  'required | numeric |  min:12',

        ];

        $input = [
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'),
            'email' => $request->input('email'),
            'asal'  => $request->input('asal'),
            'hp' => $request->input('hp'),
            'role_id' => $role->role_id,
        ];


        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max.',
            'mimes' => '*Format file :attribute tidak didukung.',
            'email' => '*Email tidak valid'
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create($rules);
      
        if ($request->input('user')) {
            return redirect('/registrasi')->with('success', 'Data berhasil ditambahkan!');
        }
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
            'jabatan' => $request->input('jabatan'),
            'email' => $request->input('email'),
            'asal'  => $request->input('asal'),
            'hp' => $request->input('hp'),
            'role_id' => $role->role_id,
        ];

        // ddd($data);
        User::find($id)->update($data);

        return redirect('/admin/peserta')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/peserta')->with('success', 'Data berhasil dihapus!');
    }
    public function cetakPDFPeserta($id)
    {
        $qr = base64_encode(\QrCode::errorCorrection('L')->color(0, 0, 0)->style('round')->eye('circle')->generate(url()->to('/') . '/scan/apeksi22/absen/' . $id));
        $rowspeserta = User::where('user_id', $id)->first();
        $gambar = base64_encode(file_get_contents('admin/id_card.png'));
        $lemail = base64_encode(file_get_contents('admin/mail.png'));
        $ltelp = base64_encode(file_get_contents('admin/telp.png'));
        $pdf = PDF::loadview('admin.template.pdf.peserta', ['p' => $rowspeserta, 'qr' => $qr, 'card' => $gambar, 'lemail' => $lemail, 'ltelp' => $ltelp]);
        return $pdf->stream('peserta-' . '-' . time() .     '.pdf', array('Attachment' => 0));
    }

    //Registrasi
    public function registrasi()
    {
        return view('home.registrasi', [
            'pageTitle' => 'Registrasi',
            'pesertaRows' => User::join('roles', 'roles.role_id', '=', 'users.role_id')->where('roles.role_name', 'User')->get(),
        ]);
    }
}
