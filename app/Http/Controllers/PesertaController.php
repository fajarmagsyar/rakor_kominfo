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

        $dt =  $request->validate([


            'nama'      =>  'required',
            'jabatan'   =>  'required',
            'email'     =>  'Email',
            'asal'      =>  'required',
            'hp'        =>  'required | numeric |  min:12',
            'role_id'   =>  $role->role_id,
        ],
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'),
            'email' => $request->input('email'),
            'asal'  => $request->input('asal'),
            'hp' => $request->input('hp'),
            'role_id' => $role->role_id,
        ]);

             echo $dt['nama'];       echo "<br>";
             echo $dt['jabatan'];    echo "<br>";
             echo $dt['email'];      echo "<br>";
             echo $dt['email'];      echo "<br>";
             echo $dt['asal'];       echo "<br>";
             echo $dt['role_id'];

        // ddd($dt);
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
}
