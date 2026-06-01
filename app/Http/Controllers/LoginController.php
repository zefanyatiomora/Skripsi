<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PenggunaModel;

class LoginController extends Controller
{
    // ======================
    // LOGIN
    // ======================
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // cari user berdasarkan username
        $user = PenggunaModel::where('username', $request->username)->first();

        // cek user & password
        if ($user && $request->password == $user->password) {

            Auth::login($user);

            $request->session()->regenerate();

            // redirect sesuai role
            if ($user->role == 'admin') {
                return redirect()->route('dashboard.admin');
            }

            if ($user->role == 'mahasiswa') {
                return redirect()->route('dashboard.mahasiswa');
            }

            return redirect('/');
        }

        return back()->with('error', 'Username atau password salah');
    }

    // ======================
    // REGISTER
    // ======================
    public function register(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'username' => 'required|unique:pengguna',
            'email_pengguna' => 'required|email|unique:pengguna',
            'password' => 'required|min:6',
        ]);

        $user = PenggunaModel::create([
            'nama_pengguna' => $request->nama_pengguna,
            'username' => $request->username,
            'email_pengguna' => $request->email_pengguna,
            'password' => $request->password,
            'role' => 'mahasiswa',
            'id_jenis_pengguna' => 2
        ]);

        Auth::login($user);

        return redirect()->route('dashboard.mahasiswa');
    }

    // ======================
    // LOGOUT
    // ======================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
