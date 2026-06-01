<?php

namespace App\Http\Controllers;

use App\Models\OkupasiModel;
use App\Models\ClusterSkillModel;
use App\Models\AreaFungsiModel;
use App\Models\KompetensiModel;
use Illuminate\Http\Request;

class OkupasiController extends Controller
{
    /**
     * TAMPILKAN SEMUA OKUPASI
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $okupasi = OkupasiModel::with([
            'clusterSkill',
            'areaFungsi',
            'kompetensi'
        ])
            ->when($search, function ($query) use ($search) {
                $query->where('kode_okupasi', 'like', "%{$search}%")
                    ->orWhere('nama_okupasi', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        return view(
            'admin.okupasi.index',
            compact('okupasi', 'search')
        );
    }
    /**
     * FORM TAMBAH OKUPASI
     */
    public function create()
    {
        $clusterSkill = ClusterSkillModel::with('areaFungsi')->get();

        $kompetensi = KompetensiModel::all();

        return view('admin.okupasi.create', compact(
            'clusterSkill',
            'kompetensi'
        ));
    }

    /**
     * SIMPAN DATA OKUPASI
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_okupasi' => 'required|unique:okupasi,kode_okupasi',

            'nama_okupasi' => 'required',

            'id_cluster_skill' =>
            'required|exists:cluster_skill,id_cluster_skill',

            'kompetensi' =>
            'required|array|min:1',

            'kompetensi.*' =>
            'exists:kompetensi,id_kompetensi',

            'deskripsi' => 'nullable'
        ]);

        try {

            $cluster = ClusterSkillModel::findOrFail(
                $validated['id_cluster_skill']
            );

            $okupasi = OkupasiModel::create([
                'kode_okupasi' => $validated['kode_okupasi'],
                'nama_okupasi' => $validated['nama_okupasi'],
                'id_cluster_skill' => $validated['id_cluster_skill'],
                'id_area_fungsi' => $cluster->id_area_fungsi,
                'deskripsi' => $validated['deskripsi'] ?? null,
            ]);

            $okupasi->kompetensi()->attach(
                $validated['kompetensi']
            );

            return redirect()
                ->route('okupasi.index')
                ->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }
    /**
     * FORM EDIT OKUPASI
     */
    public function edit($id)
    {
        $okupasi = OkupasiModel::with([
            'kompetensi',
            'clusterSkill',
            'areaFungsi'
        ])->findOrFail($id);

        $clusterSkill = ClusterSkillModel::with('areaFungsi')->get();

        $kompetensi = KompetensiModel::all();

        return view('admin.okupasi.edit', compact(
            'okupasi',
            'clusterSkill',
            'kompetensi'
        ));
    }
    /**
     * UPDATE OKUPASI
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_okupasi' => 'required',

            'nama_okupasi' => 'required',

            'id_cluster_skill' =>
            'required|exists:cluster_skill,id_cluster_skill',

            'kompetensi' => 'required|array|min:1',

            'kompetensi.*' =>
            'exists:kompetensi,id_kompetensi',

            'deskripsi' => 'nullable'

        ], [
            'kompetensi.required' =>
            'Minimal pilih satu kompetensi.'
        ]);

        try {

            $okupasi = OkupasiModel::findOrFail($id);

            $cluster = ClusterSkillModel::findOrFail(
                $request->id_cluster_skill
            );

            $okupasi->update([
                'kode_okupasi'     => trim($request->kode_okupasi),
                'nama_okupasi'     => trim($request->nama_okupasi),
                'id_cluster_skill' => $request->id_cluster_skill,
                'id_area_fungsi'   => $cluster->id_area_fungsi,
                'deskripsi'        => $request->deskripsi,
            ]);

            if ($request->has('kompetensi')) {
                $okupasi->kompetensi()->sync(
                    $request->kompetensi
                );
            }

            return redirect()
                ->route('okupasi.index')
                ->with(
                    'success',
                    'Data okupasi berhasil diperbarui.'
                );
        } catch (\Exception $e) {

            return back()
                ->withInput()
                ->withErrors([
                    'error' => $e->getMessage()
                ]);
        }
    }
    /**
     * DETAIL OKUPASI
     */
    public function show($id)
    {
        $okupasi = OkupasiModel::with([
            'clusterSkill',
            'areaFungsi',
            'kompetensi'
        ])->findOrFail($id);
        return view(
            'admin.okupasi.show',
            compact('okupasi')
        );
    }
    /**
     * HAPUS OKUPASI
     */
    public function destroy($id)
    {
        $okupasi = OkupasiModel::findOrFail($id);
        // HAPUS RELASI PIVOT
        $okupasi->kompetensi()->detach();
        // HAPUS DATA
        $okupasi->delete();
        
        return redirect()
            ->route('okupasi.index')
            ->with('success', 'Data okupasi berhasil dihapus');
    }
}
