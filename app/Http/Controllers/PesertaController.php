<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
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
            'pesertaRows' => User::join('roles', 'roles.role_id', '=', 'users.role_id')
                ->where('roles.role_name', 'User')->get(),
        ]);
    }
    public function create()
    {
        //
        return view('admin.peserta.create', [
            'page' => 'Kegiatan | RAKOR KOMINFO',
            'pageTitle' => 'Tambah Peserta',

        ]);
    }
    public function store(Request $request)
    {
        $role = Roles::where('role_name', 'User')->first();

        $rules = [
            'nama'          =>  'required',
            'jabatan'       =>  'required',
            'email'         =>  'email | required | unique:users',
            'asal'          =>  'required',
            'kategori'      =>  'required',
            'hp'            =>  'required|numeric|min:12|unique:users',
            'foto'          =>  'file | required',
        ];

        $input = [
            'nama'           => $request->input('nama'),
            'jabatan'        => $request->input('jabatan'),
            'harapan'        => $request->input('harapan'),
            'kategori'        => $request->input('kategori'),
            'email'          => $request->input('email'),
            'asal'           => $request->input('asal'),
            'hp'             => $request->input('hp'),
            'datang'         => $request->input('datang'),
            'pergi'          => $request->input('pergi'),
            'maskapai'       => $request->input('maskapai'),
            'pic'            => ($request->input('pic')) ? '1' : '0',
            'role_id'        => $role->role_id,
            'foto'          =>  $request->file('foto'),
        ];

        $messages = [
            'required'      => '*Kolom :attribute wajib diisi.',
            'file'          => '*File :attribute wajib dipilih.',
            'min'           => '* Nomor :attribute minimal :min digit.',
            'mimes'         => '*Format file :attribute tidak didukung.',
            'email'         => '*Email tidak valid',
            'unique'        => '*Sudah terdaftar'
        ];
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $doc_name = 'peserta/' . 'foto-' . date('Y-m-d_H-i-s') . rand(0, 100000) . '.' . $request->file('foto')->getClientOriginalExtension();

        $input['foto'] = $doc_name;

        $userBaru = User::create($input)->getAttributes();
        $request->file('foto')->move(public_path('peserta'), $doc_name);
        if ($request->input('user')) {
            return redirect('/registrasi-result/' . $userBaru['user_id'])->with('success', 'Data berhasil ditambahkan!');
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
            'datang' => $request->input('datang'),
            'pergi' => $request->input('pergi'),
            'maskapai' => $request->input('maskapai'),
            'maskapai' => $request->input('maskapai'),
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
        $rowspeserta = User::where('user_id', $id)->first();

        if ($rowspeserta->kategori == "Kepala Dinas KOMINFO" || $rowspeserta->kategori == "DPRD" || $rowspeserta->kategori == "SEKDA") {
            $gambar = base64_encode(file_get_contents('admin/dprd-sekda.png'));
        } elseif ($rowspeserta->kategori == "Panitia") {
            $gambar = base64_encode(file_get_contents('admin/panitia.png'));
        } else {
            $gambar = base64_encode(file_get_contents('admin/id_card.png'));
        }

        $lemail = base64_encode(file_get_contents('admin/mail.png'));
        $ltelp = base64_encode(file_get_contents('admin/telp.png'));
        $foto = base64_encode(file_get_contents($rowspeserta->foto));

        if ($rowspeserta->kategori == "Panitia") {
            $qr = base64_encode(\QrCode::generate('MECARD:' . $rowspeserta->nama . ';' . $rowspeserta->asal . ';TEL:' . $rowspeserta->hp . ';EMAIL:' . $rowspeserta->email . ';'));
            $pdf = PDF::loadview('admin.template.pdf.panitia', ['p' => $rowspeserta, 'foto' => $foto, 'qr' => $qr, 'card' => $gambar, 'lemail' => $lemail, 'ltelp' => $ltelp]);
            return $pdf->stream('panitia-' . '-' . time() .     '.pdf', array('Attachment' => 0));
        }
        $qr = base64_encode(\QrCode::errorCorrection('L')->color(0, 0, 0)->style('round')->eye('circle')->generate(url()->to('/') . '/scan/apeksi22/absen/' . $id));

        $pdf = PDF::loadview('admin.template.pdf.peserta', ['p' => $rowspeserta, 'foto' => $foto, 'qr' => $qr, 'card' => $gambar, 'lemail' => $lemail, 'ltelp' => $ltelp]);
        return $pdf->stream('peserta-' . '-' . time() .     '.pdf', array('Attachment' => 0));
    }
    public function cetakPDFPesertaByNoHP(Request $req)
    {
        $nohp = $req->input('no_hp');
        $rowspeserta = User::where('hp', $nohp)->first();

        if ($rowspeserta == null) {
            return redirect('/')->with('failed', 'No HP tidak ditemukan silahkan daftar terlebih dahulu');
        }
        return $this->cetakPDFPeserta($rowspeserta->user_id);
    }
    //Registrasi
    public function registrasi()
    {
        return view('home.registrasi', [
            'pageTitle' => 'Registrasi',
            'pesertaRows' => User::join('roles', 'roles.role_id', '=', 'users.role_id')->where('roles.role_name', 'User')->get(),
            'kota' => [
                'KOTA KUPANG',
                'KABUPATEN ALOR',
                'KABUPATEN BELU',
                'KABUPATEN ENDE',
                'KABUPATEN FLORES TIMUR',
                'KABUPATEN KUPANG',
                'KABUPATEN LEMBATA',
                'KABUPATEN MALAKA',
                'KABUPATEN MANGGARAI',
                'KABUPATEN MANGGARAI BARAT',
                'KABUPATEN MANGGARAI TIMUR',
                'KABUPATEN NAGEKEO',
                'KABUPATEN NGADA',
                'KABUPATEN ROTE NDAO',
                'KABUPATEN SABU RAIJUA',
                'KABUPATEN SIKKA',
                'KABUPATEN SUMBA BARAT',
                'KABUPATEN SUMBA BARAT DAYA',
                'KABUPATEN SUMBA TENGAH',
                'KABUPATEN SUMBA TIMUR',
                'KABUPATEN TIMOR TENGAH SELATAN',
                'KABUPATEN TIMOR TENGAH UTARA',
            ],
            'kategori' => [
                'DPRD',
                'SEKDA',
                'Kepala Dinas KOMINFO',
                'Pendamping',
            ],
        ]);
    }

    public function registrasiPanitia()
    {
        return view('home.registrasi-panitia', [
            'pageTitle' => 'Registrasi',
            'pesertaRows' => User::join('roles', 'roles.role_id', '=', 'users.role_id')->where('roles.role_name', 'User')->get(),
            'kota' => [
                'DISKOMINFO Provinsi NTT',
                'DISKOMINFO Kota Kupang',
            ],
            'kategori' => [
                'Panitia'
            ],
        ]);
    }

    public function registrasiResult($id)
    {
        return view('home.registrasi-result', [
            'pageTitle' => 'Registrasi',
            'pesertaRow' => User::find($id),
        ]);
    }
}
