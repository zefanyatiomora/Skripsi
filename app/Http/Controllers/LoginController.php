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

        // cek username
        $user = PenggunaModel::where('username', $request->username)->first();

        if (!$user) {
            return back()->with('error_username', true);
        }

        // cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error_password', true);
        }

        Auth::login($user);

        $request->session()->regenerate();

        if ($user->role == 'admin') {
            return redirect()->route('dashboard.admin');
        }

        if ($user->role == 'mahasiswa') {
            return redirect()->route('dashboard.mahasiswa');
        }

        return redirect('/');
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

        PenggunaModel::create([
            'nama_pengguna' => $request->nama_pengguna,
            'username' => $request->username,
            'email_pengguna' => $request->email_pengguna,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
            'id_jenis_pengguna' => 2
        ]);

        return redirect('/')->with('success_register', 'Akun berhasil dibuat');
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
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email_pengguna' => 'required|email'
        ]);

        $user = PenggunaModel::where(
            'email_pengguna',
            $request->email_pengguna
        )->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        return view('auth.reset-password', [
            'email' => $request->email_pengguna
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email_pengguna' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = PenggunaModel::where(
            'email_pengguna',
            $request->email_pengguna
        )->first();

        if (!$user) {
            return redirect()->route('forgot.password');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')
            ->with('success_password', true);
    }
}
