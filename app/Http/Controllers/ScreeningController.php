<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClusterSkillModel;
use Illuminate\Support\Facades\DB;

class ScreeningController extends Controller
{
    public function index()
    {
        $questions = DB::table('screening_pertanyaan')->get();

        return view('tes_kemampuan.index', compact('questions'));
    }

    public function submit(Request $request)
    {
        $jawaban = $request->jawaban ?? [];

        /*
        |--------------------------------------------------------------------------
        | Hitung skor tiap cluster
        |--------------------------------------------------------------------------
        */

        $clusterScore = [];

        foreach ($jawaban as $idPertanyaan => $nilai) {

            // hanya hitung jawaban YA
            if ($nilai != 1) {
                continue;
            }

            $mappings = DB::table('screening_mapping')
                ->where('id_pertanyaan', $idPertanyaan)
                ->get();

            foreach ($mappings as $map) {

                if (!isset($clusterScore[$map->id_cluster_skill])) {
                    $clusterScore[$map->id_cluster_skill] = 0;
                }

                $clusterScore[$map->id_cluster_skill]++;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil cluster dengan skor tertinggi
        |--------------------------------------------------------------------------
        */

        arsort($clusterScore);

        $topClusterIds = array_keys($clusterScore);

        // ambil maksimal 3 cluster terbaik
        $topClusterIds = array_slice($topClusterIds, 0, 3);

        /*
        |--------------------------------------------------------------------------
        | Ambil data cluster
        |--------------------------------------------------------------------------
        */

        $clusters = ClusterSkillModel::with('areaFungsi')
            ->whereIn('id_cluster_skill', $topClusterIds)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Redirect ke halaman hasil screening
        |--------------------------------------------------------------------------
        */

        return view('tes_kemampuan.hasil_screening', compact(
            'clusters',
            'clusterScore'
        ));
    }
}