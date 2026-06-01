@extends('layouts.template')

@section('content')

<style>
    body {
        background: #f4f7fb;
        font-family: 'Poppins', sans-serif;
    }

    .page-wrapper {
        padding: 10px 5px 30px;
    }

    /* HEADER */
    .page-header {
        margin-bottom: 25px;
    }

    .page-title {
        font-size: 30px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 5px;
    }

    .page-subtitle {
        color: #64748b;
        font-size: 14px;
    }

    /* CARD */
    .form-card {
        background: white;
        border-radius: 24px;
        padding: 32px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 6px 18px rgba(0,0,0,0.03);
    }

    /* FORM */
    .form-label {
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
    }

    .form-control {
        height: 50px;
        border-radius: 14px;
        border: 1px solid #dbe2ea;
        padding: 10px 16px;
        font-size: 14px;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #2563eb;
    }

    textarea.form-control {
        height: 120px;
        resize: none;
    }

    /* BUTTON */
    .btn-save {
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 14px;
        padding: 12px 24px;
        font-weight: 600;
        transition: .25s;
    }

    .btn-save:hover {
        background: #1d4ed8;
        color: white;
    }

    .btn-back {
        background: #f1f5f9;
        color: #334155;
        border-radius: 14px;
        padding: 12px 24px;
        font-weight: 600;
        border: none;
    }

    .btn-back:hover {
        background: #e2e8f0;
        color: #0f172a;
    }

    .invalid-feedback {
        display: block;
    }
</style>

<div class="container-fluid page-wrapper">

    <!-- HEADER -->
    <div class="page-header">

        <div class="page-title">
            Tambah Area Fungsi
        </div>

        <div class="page-subtitle">
            Tambahkan data area fungsi baru
        </div>

    </div>

    <!-- FORM -->
    <div class="form-card">

        <form action="{{ route('area-fungsi.store') }}"
            method="POST">

            @csrf

            <!-- KODE -->
            <div class="form-group mb-4">

                <label class="form-label">
                    Kode Area Fungsi
                </label>

                <input type="text"
                    name="kode_area_fungsi"
                    class="form-control @error('kode_area_fungsi') is-invalid @enderror"
                    value="{{ old('kode_area_fungsi') }}"
                    placeholder="Contoh: AF001">

                @error('kode_area_fungsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- NAMA -->
            <div class="form-group mb-4">

                <label class="form-label">
                    Nama Area Fungsi
                </label>

                <input type="text"
                    name="nama_area_fungsi"
                    class="form-control @error('nama_area_fungsi') is-invalid @enderror"
                    value="{{ old('nama_area_fungsi') }}"
                    placeholder="Masukkan nama area fungsi">

                @error('nama_area_fungsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- BUTTON -->
            <div class="d-flex">

                <button type="submit"
                    class="btn btn-save mr-2">

                    <i class="fas fa-save mr-2"></i>
                    Simpan

                </button>

                <a href="{{ route('area-fungsi.index') }}"
                    class="btn btn-back">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection