<?php

namespace App\Http\Controllers;

use App\Models\PenggunaModel;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $query = PenggunaModel::with('jenisPengguna');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama_pengguna', 'like', '%' . $search . '%')
                    ->orWhere('username', 'like', '%' . $search . '%')
                    ->orWhere('email_pengguna', 'like', '%' . $search . '%');
            });
        }

        $pengguna = $query->get();

        return view('admin.pengguna.index', compact('pengguna'));
    }
    public function show($id)
    {
        $pengguna = PenggunaModel::with('jenisPengguna')
            ->findOrFail($id);

        return view('admin.pengguna.show', compact('pengguna'));
    }
}
