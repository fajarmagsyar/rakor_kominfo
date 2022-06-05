<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
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
        ]);
    }

    public function sejarah()
    {
        return view('home.sejarah', [
            'pageTitle' => 'Sejarah',
        ]);
    }

    public function visiMisi()
    {
        return view('home.visi-misi', [
            'pageTitle' => 'Visi & Misi',
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
        return view('home.kegiatan', [
            'pageTitle' => 'List Kegiatan',
        ]);
    }

    public function wisata()
    {
        return view('home.wisata', [
            'pageTitle' => 'Wisata',
        ]);
    }

    public function wisataSingle()
    {
        return view('home.wisata-single', [
            'pageTitle' => 'Nama Wisata',
        ]);
    }



    public function hotel()
    {
        return view('home.hotel', [
            'pageTitle' => 'Hotel',
        ]);
    }

    public function hotelSingle()
    {
        return view('home.hotel-single', [
            'pageTitle' => 'Nama Hotel',
        ]);
    }
    
    public function restoran()
    {
        return view('admin.peserta.index', [
            'pageTitle' => 'Peserta',
        ]);
    }

    public function restoranSingle()
    {
        return view('home.restoran-single', [
            'pageTitle' => 'Nama Restoran',
        ]);
    }

    //Artikel
    public function artikel(){
        return view('home.artikel', [
            'pageTitle' => 'Artikel',
            'artikelRows' => Artikel::join('users', 'users.user_id', '=' , 'artikel.user_id')->get(),
        ]);
    }

    public function contact()
    {
        return view('home.contact', [
            'pageTitle' => 'Contact',
        ]);
    }

}
