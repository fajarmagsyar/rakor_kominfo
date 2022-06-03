<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index', [
            'page' => 'Login',
        ]);
    }

    public function signIn(Request $request, User $user)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $input = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'email' => '*Kolom :attribute tidak valid.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if (Auth::attempt($input)) {

            Auth::logoutOtherDevices($request->input('password'));

            $request->session()->regenerate();
            if ($user->hasRole('Admin')) {
                return redirect('/admin/dashboard');
            } else {
                $this->logout($request);
            }
        }

        return redirect('/login')->with('error', 'Login Gagal!');
    }

    public function signOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
