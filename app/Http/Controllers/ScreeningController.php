<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ClusterSkillModel;
use App\Models\DomainModel;
use App\Models\HasilTesModel;
use Illuminate\Support\Facades\Auth;


class ScreeningController extends Controller
{
    public function index()
    {
        $domains = DomainModel::all();

        return view('tes_kemampuan.index', compact('domains'));
    }
    public function getCluster(Request $request)
    {
        $domainIds = $request->id_domain;

        if (!$domainIds) {
            return response()->json([]);
        }

        // pastikan array
        if (!is_array($domainIds)) {
            $domainIds = [$domainIds];
        }

        $clusters = ClusterSkillModel::whereIn('id_domain', $domainIds)->get();

        return response()->json($clusters);
    }
    public function soal(Request $request)
    {
        $clusterIds = $request->cluster_skill;

        if (!$clusterIds) {
            return back()->with('error', 'Pilih minimal 1 cluster');
        }

        $questions = DB::table('screening_pertanyaan')
            ->join(
                'screening_mapping',
                'screening_pertanyaan.id_pertanyaan',
                '=',
                'screening_mapping.id_pertanyaan'
            )
            ->whereIn('screening_mapping.id_cluster_skill', $clusterIds)
            ->select('screening_pertanyaan.*')
            ->distinct()
            ->get();

        return view('tes_kemampuan.soal_screening', compact('questions', 'clusterIds'));
    }
    public function submit(Request $request)
    {
        $jawaban = $request->jawaban ?? [];

        $clusterScore = [];

        // 1. Hitung hanya jawaban YA (1)
        foreach ($jawaban as $idPertanyaan => $nilai) {

            if ((int)$nilai !== 1) continue;

            $clusters = DB::table('screening_mapping')
                ->where('id_pertanyaan', $idPertanyaan)
                ->pluck('id_cluster_skill');

            foreach ($clusters as $clusterId) {
                $clusterScore[$clusterId] = ($clusterScore[$clusterId] ?? 0) + 1;
            }
        }

        if (empty($clusterScore)) {
            return view('tes_kemampuan.hasil_screening', [
                'clusters' => collect(),
                'clusterUtama' => null
            ]);
        }

        // 2. cari nilai tertinggi
        $maxScore = max($clusterScore);

        // 3. AMBIL HANYA CLUSTER TERBESAR (kalau seri, tetap bisa lebih dari 1)
        $topClusterIds = array_keys(
            array_filter($clusterScore, fn($score) => $score === $maxScore)
        );

        // 4. AMBIL DATA CLUSTER
        $clusters = ClusterSkillModel::whereIn('id_cluster_skill', $topClusterIds)
            ->get();

        // 5. SIMPAN HASIL (cluster utama saja)
        $userId = Auth::user()->id_pengguna ?? Auth::id();

        HasilTesModel::create([
            'id_pengguna' => $userId,
            'id_cluster_skill' => $topClusterIds[0],
            'tanggal_tes' => now()
        ]);

        return view('tes_kemampuan.hasil_screening', [
            'clusters' => $clusters,
            'clusterUtama' => $clusters->first()
        ]);
    }
}
