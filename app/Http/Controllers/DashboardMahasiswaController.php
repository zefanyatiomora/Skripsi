<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenggunaModel;

class DashboardMahasiswaController extends Controller
{
    public function mahasiswa()
    {
        // Ambil mahasiswa pertama (sementara)
        $user = PenggunaModel::where('role', 'mahasiswa')->first();

        return view('dashboard.mahasiswa', compact('user'));
    }
}