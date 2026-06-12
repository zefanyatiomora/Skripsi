@extends('layouts.template')

@section('content')
    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .btn-back {
            background: #0f172a;
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 20px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s;
        }

        .btn-back:hover {
            background: #1e293b;
            color: white;
            text-decoration: none;
        }

        @media(max-width:768px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

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

        .detail-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .03);
        }

        .detail-row {
            display: flex;
            align-items: center;
            padding: 18px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            width: 220px;
            font-size: 14px;
            font-weight: 600;
            color: #64748b;
        }

        .detail-value {
            flex: 1;
            font-size: 15px;
            font-weight: 500;
            color: #0f172a;
        }

        .badge-role {
            display: inline-block;
            padding: 7px 14px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-admin {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-mahasiswa {
            background: #dcfce7;
            color: #15803d;
        }

        @media(max-width:768px) {

            .detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .detail-label {
                width: 100%;
            }

        }
    </style>

    </style>
    <div class="container-fluid page-wrapper">

        <div class="page-header">

            <div>
                <div class="page-title">
                    Detail Pengguna
                </div>

                <div class="page-subtitle">
                    Informasi lengkap data pengguna
                </div>
            </div>

            <a href="{{ route('pengguna.index') }}" class="btn-back">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>

        </div>

        <div class="detail-card">

            <div class="detail-row">
                <div class="detail-label">ID Pengguna</div>
                <div class="detail-value">
                    {{ $pengguna->id_pengguna }}
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Nama Pengguna</div>
                <div class="detail-value">
                    {{ $pengguna->nama_pengguna }}
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Username</div>
                <div class="detail-value">
                    {{ $pengguna->username }}
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Email</div>
                <div class="detail-value">
                    {{ $pengguna->email_pengguna }}
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Role</div>
                <div class="detail-value">

                    @if ($pengguna->role == 'admin')
                        <span class="badge-role badge-admin">
                            Admin
                        </span>
                    @else
                        <span class="badge-role badge-mahasiswa">
                            Mahasiswa
                        </span>
                    @endif

                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Tanggal Dibuat</div>
                <div class="detail-value">
                    {{ $pengguna->created_at ? $pengguna->created_at->format('d M Y H:i') : '-' }}
                </div>
            </div>

        </div>

    </div>
@endsection
