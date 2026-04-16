<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // halaman login
    public function index()
    {
        return view('auth.login');
    }

    // proses login pakai NIM
    public function login(Request $request)
    {
        $request->validate([
            'nim_pengguna' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'nim_pengguna' => $request->nim_pengguna,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // redirect sesuai role
            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard');
            } else {
                return redirect('/dashboard-mahasiswa');
            }
        }

        return back()->with('error', 'NIM atau password salah');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}