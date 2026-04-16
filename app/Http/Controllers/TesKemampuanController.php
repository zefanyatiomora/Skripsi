<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaFungsiModel;
use App\Models\ClusterSkillModel;

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

        $total = array_sum($jawaban);
        $jumlah = count($jawaban);
        $persen = ($total / $jumlah) * 100;

        // RULE
        if ($persen >= 80) {
            $hasil = "Sangat Cocok";
        } elseif ($persen >= 60) {
            $hasil = "Cocok";
        } elseif ($persen >= 40) {
            $hasil = "Cukup";
        } else {
            $hasil = "Tidak Cocok";
        }

        return view('tes_kemampuan.hasil', compact(
            'total', 'jumlah', 'persen', 'hasil'
        ));
    }
}
