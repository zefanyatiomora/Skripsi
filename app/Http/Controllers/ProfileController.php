<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PenggunaModel;

class ProfileController extends Controller
{
    // ======================
    // TAMPILKAN PROFIL
    // ======================
    public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    // ======================
    // FORM EDIT
    // ======================
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    // ======================
    // UPDATE PROFIL
    // ======================
   public function update(Request $request)
{
    /** @var \App\Models\PenggunaModel $user */
    $user = Auth::user();

    $request->validate([
        'nama_pengguna' => 'required',
        'username' => 'required|unique:pengguna,username,' . $user->id_pengguna . ',id_pengguna',
        'email_pengguna' => 'required|email|unique:pengguna,email_pengguna,' . $user->id_pengguna . ',id_pengguna',
        'password' => 'nullable|min:6',
    ]);

    $data = [
        'nama_pengguna' => $request->nama_pengguna,
        'username' => $request->username,
        'email_pengguna' => $request->email_pengguna,
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }
    
    $user->update($data);

    return redirect()->route('profile.index')
        ->with('success', 'Profil berhasil diperbarui');
}
}