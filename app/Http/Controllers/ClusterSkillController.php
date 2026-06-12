<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClusterSkillModel;
use App\Models\DomainModel;
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
        $domain = DomainModel::all();

        return view(
            'admin.cluster_skill.create',
            compact('domain')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_domain' => 'required',
            'nama_cluster' =>
            'required|unique:cluster_skill,nama_cluster',
            'deskripsi' => 'nullable'
        ]);

        ClusterSkillModel::create([
            'id_domain' => $request->id_domain,
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

        $domain = DomainModel::all();

        return view(
            'admin.cluster_skill.edit',
            compact(
                'clusterSkill',
                'domain'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_domain' => 'required',
            'nama_cluster' => [
                'required',
                Rule::unique(
                    'cluster_skill',
                    'nama_cluster'
                )->ignore(
                    $id,
                    'id_cluster_skill'
                )
            ]
        ]);

        $clusterSkill = ClusterSkillModel::findOrFail($id);

        $clusterSkill->update([
            'id_domain' => $request->id_domain,
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
