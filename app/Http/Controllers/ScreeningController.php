<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ClusterSkillModel;
use App\Models\DomainModel;
use App\Models\HasilTesModel;
use App\Models\ScreeningPertanyaanModel;
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
        $clusterIds = $request->input('cluster_skill', []);

        if (empty($clusterIds)) {
            return redirect()
                ->route('screening.index')
                ->with('error', 'Silakan pilih cluster terlebih dahulu');
        }

        // pastikan array
        if (!is_array($clusterIds)) {
            $clusterIds = [$clusterIds];
        }

        // 🔥 TAMBAHAN LOGIC: jika hanya 1 cluster langsung ke hasil
        if (count($clusterIds) == 1) {

            $clusters = ClusterSkillModel::whereIn(
                'id_cluster_skill',
                $clusterIds
            )->get();

            // optional simpan session juga kalau dipakai nanti
            session([
                'top_cluster_ids' => $clusterIds
            ]);

            return view('tes_kemampuan.hasil_screening', compact('clusters'));
        }

        // kalau lebih dari 1 lanjut proses soal
        $clusters = ClusterSkillModel::whereIn(
            'id_cluster_skill',
            $clusterIds
        )->get();

        $pertanyaan = ScreeningPertanyaanModel::whereHas(
            'mapping',
            function ($q) use ($clusterIds) {
                $q->whereIn('id_cluster_skill', $clusterIds);
            }
        )
            ->distinct()
            ->get();

        return view(
            'tes_kemampuan.soal_screening',
            compact('clusters', 'pertanyaan')
        );
    }
    public function submit(Request $request)
    {
        $jawaban = $request->jawaban ?? [];

        $clusterScore = [];

        foreach ($jawaban as $idPertanyaan => $nilai) {

            if ((int)$nilai !== 1) {
                continue;
            }

            $clusterIds = DB::table('screening_mapping')
                ->where('id_pertanyaan', $idPertanyaan)
                ->pluck('id_cluster_skill');

            foreach ($clusterIds as $clusterId) {

                $clusterScore[$clusterId] =
                    ($clusterScore[$clusterId] ?? 0) + 1;
            }
        }

        if (empty($clusterScore)) {

            return back()->with(
                'error',
                'Tidak ada jawaban valid'
            );
        }

        $maxScore = max($clusterScore);

        $topClusterIds = collect($clusterScore)
            ->filter(function ($score) use ($maxScore) {
                return $score == $maxScore;
            })
            ->keys()
            ->toArray();

        $clusters = ClusterSkillModel::whereIn(
            'id_cluster_skill',
            $topClusterIds
        )->get();

        session([
            'top_cluster_ids' => $topClusterIds
        ]);

        return view(
            'tes_kemampuan.hasil_screening',
            compact(
                'clusters'
            )
        );
    }
}   
