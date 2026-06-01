<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScreeningPertanyaanModel;
use App\Models\ScreeningMappingModel;
use App\Models\ClusterSkillModel;

class ScreeningAdminController extends Controller
{
    public function index()
    {
        $screening = ScreeningPertanyaanModel::with([
            'mapping.clusterSkill'
        ])->get();

        return view('admin.screening.index', compact('screening'));
    }
     /**
     * FORM TAMBAH
     */
    public function create()
    {
        $clusterSkill = ClusterSkillModel::all();

        return view(
            'admin.screening.create',
            compact('clusterSkill')
        );
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'cluster_skill' => 'required|array'
        ]);

        // SIMPAN PERTANYAAN
        $screening = ScreeningPertanyaanModel::create([
            'pertanyaan' => $request->pertanyaan
        ]);

        // SIMPAN MAPPING
        foreach ($request->cluster_skill as $cluster) {

            ScreeningMappingModel::create([
                'id_pertanyaan' => $screening->id_pertanyaan,
                'id_cluster_skill' => $cluster
            ]);
        }

        return redirect()
            ->route('screening.admin.index')
            ->with('success', 'Pertanyaan screening berhasil ditambahkan');
    }

  /**
     * FORM EDIT
     */
    public function edit($id)
    {
        $screening = ScreeningPertanyaanModel::with([
            'mapping'
        ])->findOrFail($id);

        $clusterSkill = ClusterSkillModel::all();

        return view('admin.screening.edit', compact(
            'screening',
            'clusterSkill'
        ));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'cluster_skill' => 'required|array'
        ]);

        $screening = ScreeningPertanyaanModel::findOrFail($id);

        // UPDATE PERTANYAAN
        $screening->update([
            'pertanyaan' => $request->pertanyaan
        ]);

        // HAPUS MAPPING LAMA
        ScreeningMappingModel::where(
            'id_pertanyaan',
            $id
        )->delete();

        // INSERT MAPPING BARU
        foreach ($request->cluster_skill as $cluster) {

            ScreeningMappingModel::create([
                'id_pertanyaan' => $id,
                'id_cluster_skill' => $cluster
            ]);
        }

        return redirect()
            ->route('screening.admin.index')
            ->with('success', 'Data screening berhasil diperbarui');
    }
    /**
 * HAPUS SCREENING
 */
public function destroy($id)
{
    // HAPUS MAPPING DULU
    ScreeningMappingModel::where(
        'id_pertanyaan',
        $id
    )->delete();

    // HAPUS PERTANYAAN
    $screening = ScreeningPertanyaanModel::findOrFail($id);

    $screening->delete();

    return redirect()
        ->route('screening.admin.index')
        ->with('success', 'Data screening berhasil dihapus');
}
}
