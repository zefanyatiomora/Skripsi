<?php

namespace App\Http\Controllers;

use App\Models\PenggunaModel;
use App\Models\HasilTesModel;
use App\Models\HasilRekomendasiModel;
use App\Models\OkupasiModel;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // TOTAL DATA
        $totalMahasiswa = PenggunaModel::where('role', 'mahasiswa')->count();
        $totalTes = HasilTesModel::count();
        $totalKarir = OkupasiModel::count();

        // TES HARI INI
        $tesHariIni = HasilTesModel::whereDate(
            'tanggal_tes',
            Carbon::today()
        )->count();

        // TES TERBARU
        $recentTes = HasilTesModel::with('pengguna')
            ->latest()
            ->take(5)
            ->get();

        // KARIER TERPOPULER
        $topKarir = HasilRekomendasiModel::with('okupasi')
            ->selectRaw('id_okupasi, COUNT(*) as total')
            ->groupBy('id_okupasi')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        return view('dashboard.admin', compact(
            'totalMahasiswa',
            'totalTes',
            'totalKarir',
            'tesHariIni',
            'recentTes',
            'topKarir'
        ));
    }
}