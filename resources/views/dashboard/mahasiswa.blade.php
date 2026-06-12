@extends('layouts.template')
@section('content')

    <style>
        body {
            background: #f3f5f9;
            font-family: 'Poppins', sans-serif;
        }

        /* ===== WRAPPER ===== */
        .dashboard-wrapper {
            padding: 0 0 15px;
        }

        /* ===== HERO ===== */
        .hero-card {
            background: linear-gradient(90deg, #020817, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 20px 24px;
            color: white;
            min-height: 130px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 12px rgba(15, 23, 42, .08);
        }

        .hero-card h1 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 6px;
            line-height: 1.3;
        }

        .hero-card p {
            font-size: 13px;
            line-height: 1.6;
            color: rgba(255, 255, 255, .82);
            max-width: 580px;
            margin-bottom: 0;
        }

        .btn-start {
            margin-top: 12px;
            background: white;
            border: none;
            border-radius: 30px;
            padding: 8px 18px;
            font-size: 12px;
            font-weight: 600;
            color: #111827;
        }

        .btn-start:hover {
            background: #f8fafc;
        }

        /* ===== INFO CARD ===== */
        .info-card {
            background: white;
            border-radius: 16px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid #e5e7eb;
            height: 100%;
        }

        .info-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #eef2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: #0f172a;
            flex-shrink: 0;
        }

        .info-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .7px;
            color: #64748b;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .info-value {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.2;
        }

        /* ===== SECTION CARD ===== */
        .section-card {
            background: white;
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            padding: 20px;
            height: 100%;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 20px;
        }

        /* ===== STEP ===== */
        .step {
            display: flex;
            gap: 12px;
            position: relative;
            padding-bottom: 18px;
        }

        .step:last-child {
            padding-bottom: 0;
        }

        .step:last-child .step-line {
            display: none;
        }

        .step-left {
            position: relative;
        }

        .step-number {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #0f172a;
            color: white;
            font-size: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        .step-line {
            width: 2px;
            height: 100%;
            background: #dbe3ef;
            position: absolute;
            left: 14px;
            top: 30px;
        }

        .step-title {
            font-size: 14px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 4px;
        }

        .step-desc {
            color: #64748b;
            line-height: 1.5;
            font-size: 12px;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            border: 2px dashed #d1d5db;
            border-radius: 18px;
            padding: 32px 20px;
            text-align: center;
            min-height: 280px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .empty-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #eef2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: #64748b;
            margin-bottom: 16px;
        }

        .empty-title {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .empty-text {
            max-width: 380px;
            color: #64748b;
            line-height: 1.6;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .btn-dark-custom {
            background: #020817;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-dark-custom:hover {
            background: #111827;
            color: white;
        }

        /* ===== RESULT ===== */
        .job-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 14px;
            border-radius: 12px;
            background: #f8fafc;
            margin-bottom: 10px;
        }

        .job-name {
            font-size: 13px;
            font-weight: 600;
            color: #111827;
        }

        .job-score {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width:992px) {

            .hero-card {
                padding: 18px;
                min-height: auto;
            }

            .hero-card h1 {
                font-size: 20px;
            }

            .hero-card p {
                font-size: 12px;
            }

            .section-card {
                margin-bottom: 16px;
            }

            .empty-state {
                min-height: auto;
            }
        }

        @media(max-width:768px) {

            .hero-card {
                padding: 16px;
            }

            .hero-card h1 {
                font-size: 18px;
            }

            .hero-card p {
                font-size: 12px;
            }

            .info-value {
                font-size: 16px;
            }

            .section-title {
                font-size: 15px;
            }

            .section-card {
                padding: 16px;
            }
        }
    </style>

    <div class="container-fluid dashboard-wrapper">

        <!-- HERO -->
        <div class="hero-card mb-4">

            <div>
                <h1>Halo, {{ $user->nama_pengguna }} 👋</h1>

                <p>
                    Temukan rekomendasi karier terbaik berdasarkan kemampuan dan minat Anda.
                    Ikuti tes sekarang untuk membuka potensi masa depanmu.
                </p>

                <a href="{{ route('screening.index') }}" class="btn btn-start">
                    Mulai Tes
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

        </div>

        <!-- INFO -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="info-card">

                    <div class="info-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>

                    <div>
                        <div class="info-label">Karier Teratas</div>

                        <div class="info-value" style="font-size:24px;">
                            {{ $topKarirList[0]->okupasi->nama_okupasi ?? '-' }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="info-card">

                    <div class="info-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>

                    <div>
                        <div class="info-label">Skor Tertinggi</div>

                        <div class="info-value">
                            {{ $topSkor ?? '0' }}%
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- CONTENT -->
        <div class="row">

            <!-- LEFT -->
            <div class="col-lg-5 mb-4">

                <div class="section-card">

                    <div class="section-title">
                        Panduan Tes Kompetensi
                    </div>

                    <div class="step">
                        <div class="step-left">
                            <div class="step-number">1</div>
                            <div class="step-line"></div>
                        </div>

                        <div>
                            <div class="step-title">Mulai Tes</div>
                            <div class="step-desc">
                                Klik tombol <strong>Mulai Tes</strong> untuk memulai proses
                                screening minat dan kompetensi.
                            </div>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step-left">
                            <div class="step-number">2</div>
                            <div class="step-line"></div>
                        </div>

                        <div>
                            <div class="step-title">Pilih Aktivitas atau Minat</div>
                            <div class="step-desc">
                                Pilih aktivitas, bidang, atau kegiatan yang paling sesuai dengan
                                pengalaman dan minat Anda.
                            </div>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step-left">
                            <div class="step-number">3</div>
                            <div class="step-line"></div>
                        </div>

                        <div>
                            <div class="step-title">Tentukan Fokus Utama</div>
                            <div class="step-desc">
                                Pilih fokus atau bidang yang paling menggambarkan kemampuan,
                                ketertarikan, dan tujuan karier Anda.
                            </div>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step-left">
                            <div class="step-number">4</div>
                            <div class="step-line"></div>
                        </div>

                        <div>
                            <div class="step-title">Jawab Pertanyaan Screening</div>
                            <div class="step-desc">
                                Jawab seluruh pertanyaan dengan jujur sesuai kondisi,
                                pengalaman, dan kemampuan yang Anda miliki.
                            </div>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step-left">
                            <div class="step-number">5</div>
                        </div>

                        <div>
                            <div class="step-title">Lihat Rekomendasi Karier</div>
                            <div class="step-desc">
                                Sistem akan menampilkan rekomendasi karier beserta tingkat
                                kecocokan berdasarkan hasil screening yang telah Anda kerjakan.
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <!-- RIGHT -->
        <div class="col-lg-7 mb-4">

            <div class="section-card">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div class="section-title mb-0">
                        Rekomendasi Terakhir
                    </div>

                    <a href="#" class="text-dark font-weight-medium">
                        Lihat Semua
                    </a>

                </div>

                @if (isset($top3) && $top3->count() > 0)
                    @foreach ($top3 as $index => $item)
                        <div class="job-item">

                            <div class="job-name">
                                {{ $index + 1 }}. {{ $item->okupasi->nama_okupasi }}
                            </div>

                            <div class="job-score">
                                {{ number_format($item->skor, 1) }}%
                            </div>

                        </div>
                    @endforeach

                    <small class="text-muted">
                        Terakhir tes: {{ $tanggalTes ?? '-' }}
                    </small>
                @else
                    <div class="empty-state">

                        <div class="empty-icon">
                            <i class="far fa-folder-open"></i>
                        </div>

                        <div class="empty-title">
                            Belum ada hasil tes
                        </div>

                        <div class="empty-text">
                            Anda belum memiliki riwayat tes kompetensi.
                            Ambil tes pertama Anda untuk melihat rekomendasi karier yang dipersonalisasi.
                        </div>

                        <a href="{{ route('screening.index') }}" class="btn btn-dark-custom">
                            Mulai Tes Sekarang
                        </a>

                    </div>
                @endif

            </div>

        </div>

    </div>

    </div>

@endsection
