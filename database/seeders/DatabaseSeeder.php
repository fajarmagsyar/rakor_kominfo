<?php

namespace Database\Seeders;

use App\Models\Absen;
use App\Models\Artikel;
use App\Models\Kegiatan;
use App\Models\Fasilitas;
use App\Models\Profil;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $role1 = Roles::create([
            'role_name' => 'Admin',
            'role_name_detail' => 'Role for Admin',
        ])->getAttributes();

        $role2 = Roles::create([
            'role_name' => 'User',
            'role_name_detail' => 'Role for Users',
        ])->getAttributes();

        $user1 = User::create([
            'nama' => 'user1',
            'email' => 'example@mail.com',
            'asal' => 'kota ambon',
            'hp' => '085277123234',
            'password' => Hash::make('Admin1234'),
            'role_id' => $role1['role_id'],
        ])->getAttributes();

        $user2 = User::create([
            'nama' => 'user1',
            'email' => 'example@mail.com',
            'asal' => 'kota ambon',
            'hp' => '085277123234',
            'password' => Hash::make('Admin1234'),
            'role_id' => $role1['role_id'],
        ])->getAttributes();

        $kegiatan1 = Kegiatan::create([
            'nama_kegiatan' => 'user1',
            'tanggal' => '2019-03-01',
            'jam_masuk' => '08.00',
            'jam_keluar' => '10.00',
            'kuota' => 10,
            'lokasi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex consectetur libero laudantium nostrum ratione, facilis laboriosam vero accusantium officiis ea sequi labore eligendi aut veniam placeat saepe corrupti aliquid tempore.',
            'long_lat' => '-2.2393939393 | 1.939393939',
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex consectetur libero laudantium nostrum ratione,',
        ])->getAttributes();

        $absen1 = Absen::create([
            'kegiatan_id' => $kegiatan1['kegiatan_id'],
            'user_id' => $user1['user_id'],
            'status_peserta' => 'PT'
        ])->getAttributes();

        $artikel = Artikel::create([
            'user_id' => $user1['user_id'],
            'isi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse maiores asperiores libero exercitationem, ipsam ea, sed quaerat molestiae iste numquam pariatur sit nemo quae doloribus ab. Earum deserunt atque similique?',
        ])->getAttributes();

        $profil = Profil::create([
            'nama' => 'Kota Kupang',
            'visi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse maiores asperiores libero exercitationem.',
            'misi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse maiores asperiores libero exercitationem, ipsam ea, sed quaerat molestiae iste numquam pariatur sit nemo quae doloribus ab. Earum deserunt atque similique?',
            'sejarah' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex consectetur libero laudantium nostrum ratione, facilis laboriosam vero accusantium officiis ea sequi labore eligendi aut veniam placeat saepe corrupti aliquid tempore.
            Eveniet odit quisquam sit reiciendis. Adipisci, vel at eum numquam id quidem nam obcaecati reprehenderit deleniti veritatis magni consequatur est provident dolor, porro ducimus nulla iure minus ipsa eius omnis.',
            'struktur' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'
        ])->getAttributes();

        $fasilitas1 = Fasilitas::create([
            'kategori' => 'Hotel',
            'nama_fasilitas' => 'Hotel Citra',
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex consectetur libero laudantium nostrum ratione, facilis laboriosam vero accusantium officiis ea sequi labore eligendi aut veniam placeat saepe corrupti aliquid tempore.',
            'foto' => 'hotel.jpg',
            'lokasi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex consectetur libero laudantium nostrum ratione, facilis laboriosam vero accusantium officiis ea sequi labore eligendi aut veniam placeat saepe corrupti aliquid tempore.',
            'long_lat' => '-2.2393939393 | 1.939393939',

        ])->getAttributes();
    }
}
