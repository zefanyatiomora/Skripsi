<?php

namespace App\Http\Controllers;

use App\Models\PenggunaModel;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = PenggunaModel::with('jenisPengguna')
            ->latest()
            ->get();

        return view('admin.pengguna.index', compact('pengguna'));
    }
}