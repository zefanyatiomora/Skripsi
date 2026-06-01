<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClusterSkillModel;
use App\Models\AreaFungsiModel;
use Illuminate\Validation\Rule;

class ClusterSkillController extends Controller
{
    /**
     * TAMPIL DATA
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $clusterSkill = ClusterSkillModel::with('areaFungsi')
            ->when($search, function ($query) use ($search) {

                $query->where('nama_cluster', 'like', "%{$search}%")
                    ->orWhereHas('areaFungsi', function ($q) use ($search) {

                        $q->where(
                            'nama_area_fungsi',
                            'like',
                            "%{$search}%"
                        );
                    });
            })
            ->get();

        return view(
            'admin.cluster_skill.index',
            compact(
                'clusterSkill',
                'search'
            )
        );
    }

    /**
     * FORM TAMBAH
     */
    public function create()
    {
        $areaFungsi = AreaFungsiModel::all();

        return view(
            'admin.cluster_skill.create',
            compact('areaFungsi')
        );
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_area_fungsi' => 'required',
            'nama_cluster' => 'required|unique:cluster_skill,nama_cluster'
        ]);

        ClusterSkillModel::create([
            'id_area_fungsi' => $request->id_area_fungsi,
            'nama_cluster' => $request->nama_cluster
        ]);

        return redirect()
            ->route('cluster-skill.index')
            ->with('success', 'Cluster skill berhasil ditambahkan');
    }

    /**
     * FORM EDIT
     */
    public function edit($id)
    {
        $clusterSkill = ClusterSkillModel::findOrFail($id);

        $areaFungsi = AreaFungsiModel::all();

        return view(
            'admin.cluster_skill.edit',
            compact(
                'clusterSkill',
                'areaFungsi'
            )
        );
    }

    /**
     * UPDATE
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_area_fungsi' => 'required',
            'nama_cluster' => [
                'required',
                Rule::unique('cluster_skill', 'nama_cluster')
                    ->ignore($id, 'id_cluster_skill')
            ]
        ]);

        $clusterSkill = ClusterSkillModel::findOrFail($id);

        $clusterSkill->update([
            'id_area_fungsi' => $request->id_area_fungsi,
            'nama_cluster' => $request->nama_cluster
        ]);

        return redirect()
            ->route('cluster-skill.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    /**
     * HAPUS
     */
    public function destroy($id)
    {
        $clusterSkill = ClusterSkillModel::findOrFail($id);

        $clusterSkill->delete();

        return redirect()
            ->route('cluster-skill.index')
            ->with('success', 'Data berhasil dihapus');
    }
    /**
     * DETAIL DATA
     */
    public function show($id)
    {
        $clusterSkill = ClusterSkillModel::with('areaFungsi')
            ->findOrFail($id);

        return view(
            'admin.cluster_skill.show',
            compact('clusterSkill')
        );
    }
}
