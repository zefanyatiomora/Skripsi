@extends('layouts.template')

@section('content')
    <style>
        body {
            background: #f3f5f9;
            font-family: 'Poppins', sans-serif;
        }

        /* ===== WRAPPER ===== */
        .result-wrapper {
            padding: 5px 0 20px;
            max-width: 900px;
            margin: auto;
        }

        /* ===== PROGRESS ===== */
        .top-progress-wrapper {
            margin-bottom: 18px;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .progress-step {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .8px;
            color: #64748b;
            text-transform: uppercase;
        }

        .custom-progress {
            height: 6px;
            border-radius: 999px;
            background: #e2e8f0;
            overflow: hidden;
        }

        .custom-bar {
            background: linear-gradient(90deg, #020817, #0f172a, #1e293b);
        }

        /* ===== HERO ===== */
        .hero-card {
            background: linear-gradient(90deg, #020817, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 22px 24px;
            color: white;
            margin-bottom: 18px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, .08);
        }

        .hero-card h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .hero-card p {
            font-size: 13px;
            line-height: 1.8;
            color: rgba(255, 255, 255, .82);
            max-width: 600px;
            margin-bottom: 0;
        }

        /* ===== MAIN CARD ===== */
        .main-card {
            background: white;
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .03);
        }

        /* ===== INFO ALERT ===== */
        .info-alert {
            border: none;
            border-radius: 14px;
            background: #f8fafc;
            color: #475569;
            padding: 14px 16px;
            margin-bottom: 22px;
            border-left: 4px solid #0f172a;
            line-height: 1.7;
            font-size: 13px;
        }

        /* ===== TITLE ===== */
        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 18px;
        }

        /* ===== CLUSTER ===== */
        .cluster-item {
            background: #f8fafc;
            border-radius: 16px;
            padding: 18px;
            margin-bottom: 14px;
            border: 1px solid #e5e7eb;
            transition: .2s;
        }

        .cluster-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, .03);
        }

        .cluster-name {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .area-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eef2ff;
            color: #0f172a;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 600;
        }

        .cluster-description {
            margin-top: 16px;
            font-size: 13px;
            line-height: 1.8;
            color: #64748b;
        }

        /* ===== SCORE BOX ===== */
        .score-box {
            background: white;
            border-radius: 14px;
            padding: 14px;
            text-align: center;
            min-width: 100px;
            border: 1px solid #e5e7eb;
        }

        .score-label {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-weight: 600;
        }

        .score-value {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
        }

        /* ===== BUTTON ===== */
        .btn-test {
            background: #020817;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            font-size: 14px;
            transition: .2s;
        }

        .btn-test:hover {
            background: #111827;
            color: white;
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width:768px) {

            .result-wrapper {
                max-width: 100%;
            }

            .hero-card {
                padding: 18px;
            }

            .hero-card h1 {
                font-size: 20px;
            }

            .hero-card p {
                font-size: 12px;
            }

            .cluster-flex {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 14px;
            }

            .score-box {
                width: 100%;
            }

            .main-card {
                padding: 18px;
            }

            .cluster-name {
                font-size: 16px;
            }

            .section-title {
                font-size: 16px;
            }
        }
    </style>

    <div class="container-fluid result-wrapper">

        <!-- TOP PROGRESS -->
        <div class="top-progress-wrapper">

            <div class="progress-info">

                <div class="progress-step">
                    LANGKAH 2 DARI 3
                </div>

            </div>

            <div class="progress custom-progress">
                <div class="progress-bar custom-bar" style="width:66%"></div>
            </div>

        </div>

        <!-- HERO -->
        <div class="hero-card">

            <div>
                <h1>Hasil Screening Karier TI</h1>

                <p>
                    Sistem telah menganalisis minat dan kecenderungan kemampuan Anda
                    untuk menentukan cluster skill yang paling sesuai dengan potensi
                    karier di bidang teknologi informasi.
                </p>
            </div>

        </div>

        <!-- MAIN CONTENT -->
        <div class="main-card">

            <div class="info-alert">
                Berikut merupakan rekomendasi cluster skill berdasarkan hasil screening Anda.
                Cluster ini dipilih sesuai pola jawaban, minat, dan kecenderungan kemampuan
                yang Anda miliki.
            </div>

            <div class="section-title">
                Rekomendasi Cluster Skill
            </div>

            @php
                $clusterUtama = $clusters->first();
            @endphp

            @foreach ($clusters as $cluster)
                <div class="cluster-item">

                    <div class="d-flex justify-content-between align-items-center cluster-flex">

                        <div>

                            <div class="cluster-name">
                                {{ $cluster->nama_cluster }}
                            </div>

                            <div class="area-badge">
                                <i class="fas fa-layer-group"></i>
                                Cluster Skill
                            </div>

                        </div>

                    </div>

                    <div class="cluster-description">

                        <b>Deskripsi Cluster</b><br>
                        {{ $cluster->deskripsi }}

                        <br><br>

                        <b>Alasan Rekomendasi</b><br>
                        Cluster <b>{{ $cluster->nama_cluster }}</b>
                        direkomendasikan karena hasil screening menunjukkan bahwa minat,
                        kecenderungan cara berpikir, dan potensi kemampuan Anda paling sesuai
                        dengan karakteristik bidang ini.

                    </div>

                </div>
            @endforeach
            <!-- BUTTON -->
            @if ($clusterUtama)
                <div class="mt-4">

                    <form action="{{ route('tes.kemampuan.soal') }}" method="GET">

                        <button type="submit" class="btn btn-test w-100">

                            Mulai Tes Kompetensi →

                        </button>

                    </form>

                    </form>
                </div>
            @endif

        </div>

    </div>
@endsection
