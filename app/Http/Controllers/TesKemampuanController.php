<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaFungsiModel;
use App\Models\ClusterSkillModel;
use Illuminate\Support\Facades\Auth;
use App\Models\HasilTesModel;
use App\Models\HasilJawabanModel;
use App\Models\HasilRekomendasiModel;

class TesKemampuanController extends Controller
{
    // STEP 1: tampilkan area fungsi
    public function index()
    {
        $areaFungsi = AreaFungsiModel::all();

        $breadcrumb = (object)[
            'title' => 'Tes Kemampuan',
            'list' => ['Home', 'Tes Kemampuan']
        ];

        return view('tes_kemampuan.index', compact('areaFungsi', 'breadcrumb'));
    }

    // STEP 2: tampilkan cluster skill berdasarkan area
    public function cluster($id_area)
    {
        $area = AreaFungsiModel::findOrFail($id_area);

        $cluster = ClusterSkillModel::where('id_area_fungsi', $id_area)->get();

        $breadcrumb = (object)[
            'title' => 'Pilih Cluster Skill',
            'list' => ['Home', 'Tes Kemampuan', $area->nama_area_fungsi]
        ];

        return view('tes_kemampuan.cluster', compact('cluster', 'area', 'breadcrumb'));
    }
public function soal($id_cluster)
{
    $cluster = ClusterSkillModel::with('okupasi.kompetensi')->findOrFail($id_cluster);

    $kompetensi = $cluster->okupasi
        ->flatMap(function ($okupasi) {
            return $okupasi->kompetensi;
        })
        ->unique('id_kompetensi');

    return view('tes_kemampuan.soal', compact('cluster', 'kompetensi'));
}
    // proses jawaban
   public function submit(Request $request)
{
    $jawaban = $request->input('jawaban');
    $id_cluster = $request->id_cluster;

    $user = Auth::user();

    // 1. SIMPAN HASIL TES
    $hasilTes = HasilTesModel::create([
        'id_pengguna' => $user->id_pengguna,
        'id_cluster_skill' => $id_cluster,
        'tanggal_tes' => now()
    ]);

    $cluster = ClusterSkillModel::with('okupasi.kompetensi')
        ->findOrFail($id_cluster);

    $hasil = [];

    // 🔥 UNTUK BREAKDOWN
    $kompetensiSummary = [];

    foreach ($cluster->okupasi as $okupasi) {

        $total = $okupasi->kompetensi->count();
        $skor = 0;

        foreach ($okupasi->kompetensi as $k) {

            $nilai = $jawaban[$k->id_kompetensi] ?? 0;

            // 2. SIMPAN JAWABAN
            HasilJawabanModel::create([
                'id_hasil' => $hasilTes->id_hasil,
                'id_kompetensi' => $k->id_kompetensi,
                'nilai' => $nilai
            ]);

            if ($nilai == 1) {
                $skor++;
            }

            // 🔥 KUMPULKAN DATA BREAKDOWN
            if (!isset($kompetensiSummary[$k->id_kompetensi])) {
                $kompetensiSummary[$k->id_kompetensi] = [
                    'nama' => $k->kompetensi,
                    'total' => 0,
                    'jumlah' => 0
                ];
            }

            $kompetensiSummary[$k->id_kompetensi]['total']++;
            $kompetensiSummary[$k->id_kompetensi]['jumlah'] += $nilai;
        }

        // HITUNG PERSENTASE
        $persen = $total > 0 ? ($skor / $total) * 100 : 0;

        // 3. SIMPAN REKOMENDASI
        HasilRekomendasiModel::create([
            'id_hasil' => $hasilTes->id_hasil,
            'id_okupasi' => $okupasi->id_okupasi,
            'skor' => $persen
        ]);

        $hasil[] = [
            'okupasi' => $okupasi,
            'persen' => $persen
        ];
    }

    // SORTING
    usort($hasil, function ($a, $b) {
        return $b['persen'] <=> $a['persen'];
    });

    // 🔥 HITUNG NILAI AKHIR PER KOMPETENSI
    $kompetensi = collect($kompetensiSummary)->map(function ($item) {
        $persen = $item['total'] > 0
            ? ($item['jumlah'] / $item['total']) * 100
            : 0;

        return [
            'nama' => $item['nama'],
            'nilai' => round($persen)
        ];
    })
    ->sortByDesc('nilai')
    ->take(6) // biar rapi
    ->values();

    return view('tes_kemampuan.hasil', compact('hasil', 'cluster', 'kompetensi'));
}
}