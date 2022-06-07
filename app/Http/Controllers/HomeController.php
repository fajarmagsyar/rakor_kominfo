<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Profil;
use App\Models\Fasilitas;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'pageTitle' => 'Home',
        ]);
    }

    public function dewanPengurus()
    {
        return view('home.dewan-pengurus', [
            'pageTitle' => 'Dewan Pengurus',
            'profilRow' => Profil::get(),
        ]);
    }

    public function sejarah()
    {
        // dd(Profil::get());
        return view('home.sejarah', [
            'pageTitle' => 'Sejarah',
            'profilRow' => Profil::first(),
        ]);
    }

    public function visiMisi()
    {
        return view('home.visi-misi', [
            'pageTitle' => 'Visi & Misi',
            'profilRow' => Profil::get(),
        ]);
    }

    public function lambang()
    {
        return view('home.lambang', [
            'pageTitle' => 'Lambang',
        ]);
    }

    public function kegiatan()
    {
        $kegiatan = Kegiatan::orderBy('tanggal', 'asc')->get();
        foreach ($kegiatan as $k => $v) {
            $events[$k] = [
                'title' => $v->nama_kegiatan,
                'start' => $v->tanggal,
                'end' => $v->tanggal,
                'display' => 'list-item'
            ];
        }
        // dd(json_encode($events));
        return view('home.kegiatan', [
            'pageTitle' => 'List Kegiatan',
            'events' => $events,
            'kegiatan' => $kegiatan,
        ]);
    }

    public function wisata()
    {
        return view('home.wisata', [
            'pageTitle' => 'Wisata',
            'fasilitasRows' => Fasilitas::where('kategori', 'Wisata')->get(),
        ]);
    }

    public function wisataSingle($id)
    {
        return view('home.wisata-single', [
            'pageTitle' => 'Nama Wisata',
            'fasilitasRows' => Fasilitas::where('fasilitas_id', $id)->get(),
        ]);
    }



    public function hotel()
    {
        return view('home.hotel', [
            'pageTitle' => 'Hotel',
            'fasilitasRows' => Fasilitas::where('kategori', 'Hotel')->get(),
        ]);
    }

    public function hotelSingle($id)
    {
        return view('home.hotel-single', [
            'pageTitle' => 'Nama Hotel',
            'fasilitasRows' => Fasilitas::where('fasilitas_id', $id)->get(),
        ]);
    }

    public function restoran()
    {
        return view('home.restoran', [
            'pageTitle' => 'Nama Restoran',
            'fasilitasRows' => Fasilitas::where('kategori', 'Restaurant')->get(),
        ]);
    }

    public function restoranSingle($id)
    {
        return view('home.restoran-single', [
            'pageTitle' => 'Nama Restoran',
            'fasilitasRows' => Fasilitas::where('fasilitas_id', $id)->get(),
        ]);
    }

    //Artikel
    public function artikel()
    {
        return view('home.artikel', [
            'pageTitle' => 'Artikel',
            'artikelRows' => Artikel::join('users', 'users.user_id', '=', 'artikel.user_id')->get(),
        ]);
    }

    public function contact()
    {
        return view('home.contact', [
            'pageTitle' => 'Contact',
        ]);
    }

}
