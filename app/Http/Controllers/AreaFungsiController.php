<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaFungsiModel;
use Illuminate\Validation\Rule;

class AreaFungsiController extends Controller
{
    /**
     * TAMPIL DATA
     */
    public function index()
    {
        $areaFungsi = AreaFungsiModel::all();

        return view(
            'admin.area_fungsi.index',
            compact('areaFungsi')
        );
    }

    /**
     * FORM TAMBAH
     */
    public function create()
    {
        return view('admin.area_fungsi.create');
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_area_fungsi' => 'required|unique:area_fungsi,kode_area_fungsi',
            'nama_area_fungsi' => 'required',
            'deskripsi' => 'nullable'
        ]);

        AreaFungsiModel::create([
            'kode_area_fungsi' => $request->kode_area_fungsi,
            'nama_area_fungsi' => $request->nama_area_fungsi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('area-fungsi.index')
            ->with('success', 'Data area fungsi berhasil ditambahkan');
    }

    /**
     * FORM EDIT
     */
    public function edit($id)
    {
        $areaFungsi = AreaFungsiModel::findOrFail($id);

        return view(
            'admin.area_fungsi.edit',
            compact('areaFungsi')
        );
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_area_fungsi' => [
                'required',
                Rule::unique('area_fungsi', 'kode_area_fungsi')
                    ->ignore($id, 'id_area_fungsi')
            ],
            'nama_area_fungsi' => 'required',
            'deskripsi' => 'nullable'
        ]);

        $area = AreaFungsiModel::findOrFail($id);

        $area->update([
            'kode_area_fungsi' => $request->kode_area_fungsi,
            'nama_area_fungsi' => $request->nama_area_fungsi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('area-fungsi.index')
            ->with('success', 'Data berhasil diperbarui');
    }
    /**
     * HAPUS DATA
     */
    public function destroy($id)
    {
        $areaFungsi = AreaFungsiModel::findOrFail($id);

        $areaFungsi->delete();

        return redirect()
            ->route('area-fungsi.index')
            ->with('success', 'Data area fungsi berhasil dihapus');
    }
    public function show($id)
    {
        $areaFungsi = AreaFungsiModel::findOrFail($id);

        return view(
            'admin.area_fungsi.show',
            compact('areaFungsi')
        );
    }
}
