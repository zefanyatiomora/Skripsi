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

    .detail-card{
        background:#fff;
        border-radius:18px;
        border:1px solid #e5e7eb;
        padding:24px;
        box-shadow:0 4px 12px rgba(0,0,0,.04);
    }

    .summary-card{
        background:linear-gradient(135deg,#2563eb,#1d4ed8);
        color:white;
        border-radius:16px;
        padding:18px 22px;
        margin-bottom:20px;
    }

    .summary-label{
        font-size:13px;
        opacity:.9;
    }

    .summary-value{
        font-size:28px;
        font-weight:700;
    }

    .info-card{
        background:#f8fafc;
        border:1px solid #e2e8f0;
        border-radius:14px;
        padding:18px;
        height:100%;
    }

    .info-label{
        font-size:12px;
        color:#64748b;
        margin-bottom:6px;
        text-transform:uppercase;
        letter-spacing:.5px;
    }

    .info-value{
        font-size:15px;
        font-weight:600;
        color:#0f172a;
    }

    .description-box{
        background:#f8fafc;
        border:1px solid #e2e8f0;
        border-radius:14px;
        padding:18px;
        color:#334155;
        line-height:1.8;
    }

    .section-title{
        font-size:17px;
        font-weight:700;
        color:#0f172a;
        margin-bottom:15px;
    }

    .btn-back{
        background:#f1f5f9;
        color:#334155;
        border:none;
        border-radius:12px;
        padding:10px 20px;
        font-weight:600;
    }

    .btn-back:hover{
        background:#e2e8f0;
        color:#0f172a;
    }
</style>

<div class="container-fluid page-wrapper">

    <!-- Header -->
    <div class="page-header">

        <div class="page-title">
            Detail Area Fungsi
        </div>

        <div class="page-subtitle">
            Informasi lengkap area fungsi
        </div>

    </div>

    <!-- Summary -->
    <div class="summary-card">

        <div class="summary-label">
            Kode Area Fungsi
        </div>

        <div class="summary-value">
            {{ $areaFungsi->kode_area_fungsi }}
        </div>

    </div>

    <!-- Detail -->
    <div class="detail-card">

        <div class="section-title">
            Informasi Area Fungsi
        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <div class="info-card">

                    <div class="info-label">
                        Kode Area Fungsi
                    </div>

                    <div class="info-value">
                        {{ $areaFungsi->kode_area_fungsi }}
                    </div>

                </div>

            </div>

            <div class="col-md-6 mb-3">

                <div class="info-card">

                    <div class="info-label">
                        Nama Area Fungsi
                    </div>

                    <div class="info-value">
                        {{ $areaFungsi->nama_area_fungsi }}
                    </div>

                </div>

            </div>

        </div>

        <div class="mt-4">

            <div class="section-title">
                Deskripsi
            </div>

            <div class="description-box">

                {{ $areaFungsi->deskripsi ?: 'Tidak ada deskripsi.' }}

            </div>

        </div>

        <div class="mt-4">

            <a href="{{ route('area-fungsi.index') }}"
               class="btn btn-back">

                <i class="fas fa-arrow-left me-2"></i>
                Kembali

            </a>

        </div>

    </div>

</div>

@endsection