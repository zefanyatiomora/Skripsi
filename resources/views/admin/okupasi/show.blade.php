@extends('layouts.template')

@section('content')
    <style>
        .page-wrapper {
            padding: 20px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 13px;
        }

        .summary-card {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border-radius: 16px;
            padding: 18px 24px;
            color: white;
            margin-bottom: 20px;
        }

        .summary-title {
            font-size: 12px;
            opacity: .85;
        }

        .summary-value {
            font-size: 26px;
            font-weight: 700;
            margin-top: 2px;
        }

        .detail-card {
            background: #fff;
            border-radius: 18px;
            padding: 24px;
            border: 1px solid #edf2f7;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .03);
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 14px;
        }

        .info-card {
            background: #fafbfd;
            border: 1px solid #edf2f7;
            border-radius: 12px;
            padding: 14px 16px;
            margin-bottom: 12px;
        }

        .info-label {
            font-size: 11px;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
        }

        .badge-cluster,
        .badge-area {
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 600;
        }

        .description-box {
            background: #fafbfd;
            border: 1px solid #edf2f7;
            border-radius: 12px;
            padding: 16px;
            font-size: 14px;
            line-height: 1.7;
            color: #475569;
        }

        .kompetensi-card {
            background: #ffffff;
            border: 1px solid #edf2f7;
            border-radius: 12px;
            padding: 14px;
            transition: .2s;
        }

        .kompetensi-card:hover {
            border-color: #bfdbfe;
            box-shadow: 0 4px 10px rgba(37, 99, 235, .05);
        }

        .kompetensi-kode {
            display: inline-block;
            background: #eff6ff;
            color: #2563eb;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .kompetensi-nama {
            font-size: 13px;
            font-weight: 500;
            color: #1e293b;
            line-height: 1.5;
        }

        .btn-back {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #475569;
            border-radius: 10px;
            padding: 9px 16px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-back:hover {
            background: #f1f5f9;
        }
    </style>

    <div class="container-fluid page-wrapper">

        <!-- HEADER -->
        <div class="page-header">

            <div class="page-title">
                Detail Okupasi
            </div>

            <div class="page-subtitle">
                Informasi lengkap data okupasi
            </div>

        </div>

        <!-- SUMMARY -->
        <div class="summary-card">

            <div class="summary-title">
                Total Kompetensi Terkait
            </div>

            <div class="summary-value">
                {{ $okupasi->kompetensi->count() }}
            </div>

        </div>

        <!-- DETAIL -->
        <div class="detail-card">

            <div class="section-title">
                Informasi Okupasi
            </div>

            <div class="row">

                <div class="col-12 mb-2">
                    <div class="info-card">
                        <div class="info-label">Kode Okupasi</div>
                        <div class="info-value">
                            {{ $okupasi->kode_okupasi }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <div class="info-label">Nama Okupasi</div>
                        <div class="info-value">
                            {{ $okupasi->nama_okupasi }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <div class="info-label">Cluster Skill</div>

                        <span class="badge-cluster">
                            {{ $okupasi->clusterSkill->nama_cluster ?? '-' }}
                        </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <div class="info-label">Area Fungsi</div>

                        <span class="badge-area">
                            {{ $okupasi->areaFungsi->nama_area_fungsi ?? '-' }}
                        </span>
                    </div>
                </div>

            </div>

            <!-- DESKRIPSI -->
            <div class="mt-4">

                <div class="section-title">
                    Deskripsi
                </div>

                <div class="description-box">

                    {{ $okupasi->deskripsi ?: 'Tidak ada deskripsi.' }}

                </div>

            </div>

            <!-- KOMPETENSI -->
            <div class="mt-4">

                <div class="section-title">
                    Kompetensi Terkait
                </div>

                <div class="row">

                    @forelse($okupasi->kompetensi as $kompetensi)
                        <div class="col-md-6 col-lg-4 mb-3">

                            <div class="kompetensi-card">

                                <div class="kompetensi-kode">
                                    {{ $kompetensi->kode_kompetensi }}
                                </div>

                                <div class="kompetensi-nama">
                                    {{ $kompetensi->kompetensi }}
                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12">

                            <div class="description-box">
                                Tidak ada kompetensi terkait.
                            </div>

                        </div>
                    @endforelse

                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-4">

                <a href="{{ route('okupasi.index') }}" class="btn btn-back">

                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali

                </a>

            </div>

        </div>

    </div>
@endsection
