@extends('layouts.template')

@section('content')
    @php use Illuminate\Support\Str; @endphp

    <style>
        body {
            background: #f4f7fb;
            font-family: 'Poppins', sans-serif;
            color: #111827;
        }

        /* ================= WRAPPER ================= */
        .career-wrapper {
            max-width: 700px;
            margin: auto;
            padding: 8px;
        }

        /* ================= HERO ================= */
        .hero-section {
            background: linear-gradient(90deg, #020817, #0f172a, #1e293b);
            border-radius: 14px;
            padding: 14px 16px;
            color: white;
            position: relative;
            overflow: hidden;
            margin-bottom: 14px;
            box-shadow: 0 3px 10px rgba(15, 23, 42, .08);
        }

        .hero-section::after {
            content: '';
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .04);
            top: -40px;
            right: -40px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(255, 255, 255, .08);
            font-size: 9px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .hero-title {
            font-size: 18px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 6px;
        }

        .hero-subtitle {
            font-size: 11px;
            line-height: 1.7;
            color: rgba(255, 255, 255, .75);
            margin-bottom: 12px;
        }

        .hero-progress {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status {
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(255, 255, 255, .06);
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 11px;
        }

        .line {
            width: 60px;
            height: 4px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .15);
            overflow: hidden;
        }

        .line span {
            display: block;
            width: 100%;
            height: 100%;
            background: white;
        }

        /* ================= SUMMARY ================= */
        .summary-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            min-height: 75px;
        }

        .summary-icon {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            background: #eef2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .summary-label {
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            color: #64748b;
            margin-bottom: 3px;
        }

        .summary-value {
            font-size: 16px;
            font-weight: 700;
            line-height: 1.2;
        }

        .meta-badge {
            background: #eef2ff;
            color: #1e293b;
            padding: 4px 8px;
            border-radius: 999px;
            font-size: 9px;
            font-weight: 600;
        }

        /* ================= TITLE ================= */
        .section-title {
            font-size: 18px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 14px;
        }

        /* ================= CAREER CARD ================= */
        .career-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 12px;
            margin-bottom: 12px;
            position: relative;
        }

        .career-card.primary {
            border: 1.5px solid #0f172a;
        }

        .recommend-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: #020817;
            color: white;
            padding: 5px 10px;
            border-bottom-left-radius: 10px;
            font-size: 8px;
            font-weight: 700;
        }

        .career-top {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .rank-badge {
            width: 30px;
            height: 30px;
            border-radius: 10px;
            background: #020817;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .job-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-bottom: 8px;
        }

        .match-text {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 5px;
        }

        .match-text span {
            font-size: 15px;
            font-weight: 700;
            color: #020817;
        }

        .progress {
            height: 4px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .progress-bar {
            background: linear-gradient(90deg, #020817, #334155);
        }

        .job-desc {
            font-size: 11px;
            line-height: 1.7;
            color: #64748b;
        }

        /* ================= BUTTON ================= */
        .btn-dashboard {
            background: #020817;
            color: white;
            border-radius: 10px;
            padding: 8px 16px;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-dashboard:hover {
            color: white;
            background: #111827;
        }

        /* ================= MOBILE ================= */
        @media(max-width:768px) {

            .career-wrapper {
                max-width: 100%;
                padding: 6px;
            }

            .hero-section {
                padding: 12px;
            }

            .hero-title {
                font-size: 16px;
            }

            .hero-subtitle {
                font-size: 10px;
            }

            .career-top {
                flex-direction: column;
                gap: 10px;
            }

            .job-title {
                font-size: 14px;
            }

            .summary-value {
                font-size: 14px;
            }

            .section-title {
                font-size: 16px;
            }
        }
    </style>

    <div class="container-fluid career-wrapper">

        <!-- HERO -->
        <div class="hero-section">

            <div class="hero-badge">
                <i class="fas fa-sparkles"></i>
                HASIL ANALISIS KARIER
            </div>

            <div class="hero-title">
                Rekomendasi Karier Terbaik Untuk Anda
            </div>

            <div class="hero-subtitle">
                Sistem menganalisis kemampuan teknis dan minat Anda untuk
                menemukan jalur karier yang paling sesuai dengan profil,
                kompetensi, dan potensi pengembangan karier Anda.
            </div>

            <div class="hero-progress">

                <div class="status">
                    <i class="fas fa-check-circle mr-2"></i>
                    Tes Kompetensi Selesai
                </div>

                <div class="line">
                    <span></span>
                </div>

            </div>

        </div>

        <!-- SUMMARY -->
        <div class="row mb-4">

            <div class="col-md-6 mb-3">
                <div class="summary-card">
                    <div class="summary-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>

                    <div>
                        <div class="summary-label">
                            Cluster Skill
                        </div>

                        <div class="meta-badge mt-1">
                            {{ $clusters->pluck('nama_cluster')->implode(', ') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="summary-card">
                    <div class="summary-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>

                    <div>
                        <div class="summary-label">
                            Kecocokan Tertinggi
                        </div>

                        <div class="summary-value">
                            {{ number_format($hasil[0]['persen'] ?? 0, 1) }}%
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- TITLE -->
        <div class="section-title mb-4">
            Hasil Rekomendasi
        </div>

        <!-- LIST HASIL -->
        @foreach ($hasil as $index => $item)
            <div class="career-card {{ $index == 0 ? 'primary' : '' }}">

                @if ($index == 0)
                    <div class="recommend-badge">
                        <i class="fas fa-star me-1"></i>
                        REKOMENDASI UTAMA
                    </div>
                @endif

                <div class="d-flex align-items-start career-top">

                    <div class="rank-badge">
                        #{{ $index + 1 }}
                    </div>

                    <div class="flex-grow-1">

                        <div class="job-title">
                            {{ $item['okupasi']->nama_okupasi }}
                        </div>

                        <div class="job-meta">
                            <span class="meta-badge">
                                {{ $clusters->pluck('nama_cluster')->implode(', ') }}
                            </span>
                        </div>

                        <div class="match-text">
                            Match Score:
                            <span>{{ number_format($item['persen'], 1) }}%</span>
                        </div>

                        <div class="progress">
                            <div class="progress-bar" style="width: {{ $item['persen'] }}%">
                            </div>
                        </div>

                        <div class="job-desc">
                            {{ Str::limit($item['okupasi']->deskripsi, 240) }}
                        </div>

                    </div>

                </div>

            </div>
        @endforeach

        <!-- BUTTON DASHBOARD -->
        <div class="text-center mt-5">
            <a href="{{ url('/dashboard-mahasiswa') }}" class="btn-dashboard">
                <i class="fas fa-home"></i>
                Kembali ke Dashboard
            </a>
        </div>
    @endsection
