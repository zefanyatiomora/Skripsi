@extends('layouts.template')

@section('content')

<style>
    body{
        background:#f4f7fb;
        font-family:'Poppins',sans-serif;
    }

    .page-wrapper{
        padding:20px;
    }

    .page-header{
        margin-bottom:20px;
    }

    .page-title{
        font-size:26px;
        font-weight:700;
        color:#0f172a;
        margin-bottom:4px;
    }

    .page-subtitle{
        font-size:14px;
        color:#64748b;
    }

    .form-card{
        background:#fff;
        border-radius:18px;
        border:1px solid #e5e7eb;
        padding:25px;
        box-shadow:0 4px 12px rgba(0,0,0,.04);
    }

    .form-label{
        font-size:14px;
        font-weight:600;
        color:#334155;
        margin-bottom:8px;
    }

    .form-control{
        border-radius:12px;
        border:1px solid #dbe3ef;
        min-height:45px;
    }

    textarea.form-control{
        min-height:120px;
        resize:none;
    }

    .btn-update{
        background:#2563eb;
        color:white;
        border:none;
        border-radius:12px;
        padding:10px 20px;
        font-weight:600;
    }

    .btn-update:hover{
        background:#1d4ed8;
        color:white;
    }

    .btn-back{
        border-radius:12px;
        padding:10px 20px;
    }

    .error-text{
        color:#dc2626;
        font-size:13px;
        margin-top:5px;
    }
</style>

<div class="container-fluid page-wrapper">

    <div class="page-header">

        <div class="page-title">
            Edit Area Fungsi
        </div>

        <div class="page-subtitle">
            Perbarui data area fungsi
        </div>

    </div>

    <div class="form-card">

        <form action="{{ route('area-fungsi.update', $areaFungsi->id_area_fungsi) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                {{-- KODE AREA FUNGSI --}}
                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Kode Area Fungsi
                    </label>

                    <input type="text"
                           name="kode_area_fungsi"
                           class="form-control"
                           value="{{ old('kode_area_fungsi', $areaFungsi->kode_area_fungsi) }}"
                           required>

                    @error('kode_area_fungsi')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- NAMA AREA FUNGSI --}}
                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Nama Area Fungsi
                    </label>

                    <input type="text"
                           name="nama_area_fungsi"
                           class="form-control"
                           value="{{ old('nama_area_fungsi', $areaFungsi->nama_area_fungsi) }}"
                           required>

                    @error('nama_area_fungsi')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- DESKRIPSI --}}
                <div class="col-12 mb-4">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              class="form-control">{{ old('deskripsi', $areaFungsi->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('area-fungsi.index') }}"
                   class="btn btn-light border btn-back">

                    Kembali

                </a>

                <button type="submit"
                        class="btn btn-update">

                    <i class="fas fa-save me-1"></i>
                    Update

                </button>

            </div>

        </form>

    </div>

</div>

@endsection