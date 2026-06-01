<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenggunaModel;
use App\Models\HasilTesModel;
use App\Models\HasilRekomendasiModel;

class DashboardMahasiswaController extends Controller
{
    public function mahasiswa()
    {
        $user = Auth::user();
        $hasilTes = HasilTesModel::where('id_pengguna', $user->id_pengguna)
            ->latest()
            ->first();
            
        // DEFAULT VALUE
        $topKarirList = collect();
        $topSkor = null;
        $top3 = collect();
        $tanggalTes = null;

        if ($hasilTes) {

            // TOP 3 REKOMENDASI
            $top3 = HasilRekomendasiModel::with('okupasi')
                ->where('id_hasil', $hasilTes->id_hasil)
                ->orderByDesc('skor')
                ->take(3)
                ->get();

            // SKOR TERTINGGI
            $maxSkor = $top3->max('skor');

            // SEMUA OKUPASI DENGAN SKOR TERTINGGI
            $topKarirList = $top3->filter(function ($item) use ($maxSkor) {
                return $item->skor == $maxSkor;
            });

            // FORMAT SKOR
            $topSkor = $maxSkor !== null
                ? number_format($maxSkor, 2) . '%'
                : null;

            // TANGGAL TES
            $tanggalTes = \Carbon\Carbon::parse($hasilTes->tanggal_tes)
                ->translatedFormat('d F Y');
        }

        return view('dashboard.mahasiswa', compact(
            'user',
            'topKarirList',
            'topSkor',
            'top3',
            'tanggalTes'
        ));
    }
}