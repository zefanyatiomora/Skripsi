<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClusterSkillModel;
use Illuminate\Validation\Rule;

class ClusterSkillController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $clusterSkill = ClusterSkillModel::when(
            $search,
            function ($query) use ($search) {
                $query->where(
                    'nama_cluster',
                    'like',
                    "%{$search}%"
                );
            }
        )->get();

        return view(
            'admin.cluster_skill.index',
            compact(
                'clusterSkill',
                'search'
            )
        );
    }

    public function create()
    {
        return view('admin.cluster_skill.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cluster' =>
                'required|unique:cluster_skill,nama_cluster',
            'deskripsi' => 'nullable'
        ]);

        ClusterSkillModel::create([
            'nama_cluster' => $request->nama_cluster,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()
            ->route('cluster-skill.index')
            ->with(
                'success',
                'Cluster skill berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $clusterSkill = ClusterSkillModel::findOrFail($id);

        return view(
            'admin.cluster_skill.edit',
            compact('clusterSkill')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_cluster' => [
                'required',
                Rule::unique(
                    'cluster_skill',
                    'nama_cluster'
                )->ignore(
                    $id,
                    'id_cluster_skill'
                )
            ],
            'deskripsi' => 'nullable'
        ]);

        $clusterSkill = ClusterSkillModel::findOrFail($id);

        $clusterSkill->update([
            'nama_cluster' => $request->nama_cluster,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()
            ->route('cluster-skill.index')
            ->with(
                'success',
                'Data berhasil diperbarui'
            );
    }

    public function destroy($id)
    {
        $clusterSkill = ClusterSkillModel::findOrFail($id);

        $clusterSkill->delete();

        return redirect()
            ->route('cluster-skill.index')
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }

    public function show($id)
    {
        $clusterSkill = ClusterSkillModel::findOrFail($id);

        return view(
            'admin.cluster_skill.show',
            compact('clusterSkill')
        );
    }
}