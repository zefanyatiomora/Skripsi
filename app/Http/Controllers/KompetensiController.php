<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KompetensiModel;

class KompetensiController extends Controller
{
    public function ajaxStore(Request $request)
{
    $request->validate([
        'kode_kompetensi' =>
        'required|unique:kompetensi,kode_kompetensi',
        'kompetensi' =>
        'required'
    ]);
    $kompetensi = KompetensiModel::create([
        'kode_kompetensi' =>
            $request->kode_kompetensi,

        'kompetensi' =>
            $request->kompetensi
    ]);
    return response()->json([
        'success' => true,
        'data' => $kompetensi
    ]);
}
}
?>