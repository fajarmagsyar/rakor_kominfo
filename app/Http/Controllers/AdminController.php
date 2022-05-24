<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $this->authorize('Admin');
        return view('admin.index', [
            'page' => 'Admin Dashboard',
        ]);
    }
}
