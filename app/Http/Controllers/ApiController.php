<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getUserById($id)
    {
        return User::join('roles', 'roles.role_name', '=', 'User')->where('roles.role_name', 'User')->where('users.user_id', $id)->get();
    }

    public function getUserAll()
    {
        return User::join('roles', 'roles.role_id', '=', 'users.role_id')->where('roles.role_name', 'User')->get();
    }
    public function getKegiatanAll()
    {
        return Kegiatan::get();
    }
    public function getAbsenAll()
    {
        return Kegiatan::get();
    }
}
