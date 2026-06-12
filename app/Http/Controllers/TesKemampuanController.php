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
    public function soal()
    {
        $clusterIds = session(
            'top_cluster_ids',
            []
        );

        if (empty($clusterIds)) {

            return redirect()
                ->route('screening.index')
                ->with(
                    'error',
                    'Silakan lakukan screening terlebih dahulu'
                );
        }

        $clusters = ClusterSkillModel::with([
            'okupasi',
            'okupasi.kompetensi'
        ])
            ->whereIn(
                'id_cluster_skill',
                $clusterIds
            )
            ->get();

        $kompetensi = collect();

        foreach ($clusters as $cluster) {

            foreach ($cluster->okupasi as $okupasi) {

                $kompetensi = $kompetensi->merge(
                    $okupasi->kompetensi
                );
            }
        }

        $kompetensi = $kompetensi
            ->unique('id_kompetensi')
            ->values();

        return view(
            'tes_kemampuan.soal',
            compact(
                'clusters',
                'kompetensi'
            )
        );
    }
    // proses jawaban
    public function submit(Request $request)
    {
        $jawaban = $request->input('jawaban', []);
        $id_clusters = $request->input('id_cluster', []);

        $user = Auth::user();

        // Ambil cluster pertama untuk disimpan ke hasil_tes
        $id_cluster = !empty($id_clusters)
            ? $id_clusters[0]
            : null;

        // Simpan hasil tes
        $hasilTes = HasilTesModel::create([
            'id_pengguna'      => $user->id_pengguna,
            'id_cluster_skill' => $id_cluster,
            'tanggal_tes'      => now()
        ]);

        $clusters = ClusterSkillModel::with([
            'okupasi',
            'okupasi.kompetensi'
        ])
            ->whereIn('id_cluster_skill', $id_clusters)
            ->get();

        $hasil = [];
        $kompetensiSummary = [];

        foreach ($clusters as $cluster) {

            foreach ($cluster->okupasi as $okupasi) {

                $totalKompetensiOkupasi = 0;
                $jumlahBenar = 0;

                foreach ($okupasi->kompetensi as $kompetensi) {

                    $nilai = $jawaban[$kompetensi->id_kompetensi] ?? 0;

                    HasilJawabanModel::firstOrCreate(
                        [
                            'id_hasil' => $hasilTes->id_hasil,
                            'id_kompetensi' => $kompetensi->id_kompetensi
                        ],
                        [
                            'nilai' => $nilai
                        ]
                    );

                    $totalKompetensiOkupasi++;

                    if ($nilai == 1) {
                        $jumlahBenar++;
                    }

                    if (!isset($kompetensiSummary[$kompetensi->id_kompetensi])) {

                        $kompetensiSummary[$kompetensi->id_kompetensi] = [
                            'nama' => $kompetensi->kompetensi,
                            'nilai' => $nilai
                        ];
                    }
                }

                $persen = $totalKompetensiOkupasi > 0
                    ? round(
                        ($jumlahBenar / $totalKompetensiOkupasi) * 100,
                        2
                    )
                    : 0;

                HasilRekomendasiModel::create([
                    'id_hasil'   => $hasilTes->id_hasil,
                    'id_okupasi' => $okupasi->id_okupasi,
                    'skor'       => $persen
                ]);

                $hasil[] = [
                    'okupasi'       => $okupasi,
                    'jumlah_benar'  => $jumlahBenar,
                    'total'         => $totalKompetensiOkupasi,
                    'persen'        => $persen
                ];
            }
        }

        // Urutkan dari skor terbesar
        usort($hasil, function ($a, $b) {
            return $b['persen'] <=> $a['persen'];
        });

        // Ambil skor tertinggi
        $skorTertinggi = $hasil[0]['persen'] ?? 0;

        // Ambil semua okupasi yang memiliki skor tertinggi
        $hasil = array_filter($hasil, function ($item) use ($skorTertinggi) {
            return $item['persen'] == $skorTertinggi;
        });

        // Reset index array
        $hasil = array_values($hasil);
        // Kompetensi yang dijawab "Ya"
        $kompetensi = collect($kompetensiSummary)
            ->filter(function ($item) {
                return $item['nilai'] == 1;
            })
            ->map(function ($item) {
                return [
                    'nama' => $item['nama'],
                    'nilai' => 100
                ];
            })
            ->take(6)
            ->values();

        return view(
            'tes_kemampuan.hasil',
            [
                'hasil' => $hasil,
                'clusters' => $clusters,
                'kompetensi' => $kompetensi
            ]
        );
    }
}
