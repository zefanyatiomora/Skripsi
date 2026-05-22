@extends('layouts.template')
@section('content')

    <style>
        body {
            background: #f4f7fb;
        }

        /* ===== WELCOME ===== */
        .welcome-card {
            border-radius: 18px;
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            color: white;
            padding: 28px;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.25);
            transition: 0.3s;
        }

        .welcome-card:hover {
            transform: translateY(-3px);
        }

        /* ===== INFO CARD ===== */
        .info-card {
            border: none;
            border-radius: 16px;
            padding: 18px;
            text-align: center;
            background: white;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.04);
            transition: 0.25s;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        /* ICON */
        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .bg-blue {
            background: #e0ecff;
            color: #2563eb;
        }

        .bg-green {
            background: #e6f9f0;
            color: #10b981;
        }

        .bg-orange {
            background: #fff4e6;
            color: #f59e0b;
        }

        /* ===== SECTION CARD ===== */
        .section-card {
            border: none;
            border-radius: 16px;
            background: white;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.04);
            padding: 20px;
            margin-bottom: 20px;
        }

        /* ===== STEP ===== */
        .step {
            display: flex;
            gap: 12px;
            margin-bottom: 15px;
        }

        .step-number {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
        }

        .step-text small {
            color: #6b7280;
        }

        /* ===== JOB LIST ===== */
        .job-item {
            display: flex;
            justify-content: space-between;
            padding: 12px;
            border-radius: 12px;
            background: #f8fafc;
            margin-bottom: 10px;
            transition: 0.25s;
        }

        .job-item:hover {
            background: #eef4ff;
            transform: translateX(5px);
        }

        /* ===== PROFILE ===== */
        .profile-box {
            background: #f8fafc;
            border-radius: 12px;
            padding: 10px;
        }

        /* ===== TITLE ===== */
        .section-title {
            font-weight: 600;
            margin-bottom: 15px;
        }
    </style>

    <div class="container-fluid">

        <!-- WELCOME -->
        <div class="welcome-card mb-4 d-flex justify-content-between align-items-center flex-wrap">

            <div>
                <h4 class="mb-1">Halo, {{ $user->nama_pengguna }} 👋</h4>
                <small>
                    Temukan jalur karier terbaik berdasarkan kemampuan Anda.
                </small>
            </div>

            <a href="{{ route('screening.index') }}" class="btn btn-light text-primary fw-semibold px-4 py-2">
                <i class="fas fa-play-circle me-1"></i> Mulai Tes
            </a>

        </div>
        
    <!-- INFO -->
    <div class="row mb-4">

        <div class="col-md-4 mb-3">
            <div class="info-card">
                <div class="icon-box bg-green">
                    <i class="fas fa-check"></i>
                </div>
                <small>Status Tes</small>
                <h6 class="mt-1">
                    {{ isset($top3) ? 'Sudah Tes' : 'Belum Tes' }}
                </h6>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="info-card">
                <div class="icon-box bg-blue">
                    <i class="fas fa-briefcase"></i>
                </div>
                <small>Karier Teratas</small>
                <h6 class="mt-1">
                    {{ $topKarirList[0]->okupasi->nama_okupasi ?? '-' }}
                </h6>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="info-card">
                <div class="icon-box bg-orange">
                    <i class="fas fa-chart-line"></i>
                </div>
                <small>Skor</small>
                <h6 class="mt-1">
                    {{ $topSkor ?? '-' }}%
                </h6>
            </div>
        </div>

    </div>

    <div class="row">

        <!-- LEFT -->
        <div class="col-md-12">

            <!-- CARA PAKAI -->
            <div class="section-card">
                <div class="section-title">Panduan Penggunaan</div>

                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-text">
                        <b>Mulai Tes Kompetensi</b><br>
                        <small>
                            Tekan tombol <i>Mulai Tes</i> untuk memulai proses screening.
                        </small>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-text">
                        <b>Jawab Seluruh Pertanyaan</b><br>
                        <small>
                            Isi setiap pertanyaan sesuai kemampuan dan pemahaman Anda.
                        </small>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-text">
                        <b>Proses Perhitungan Sistem</b><br>
                        <small>
                            Sistem akan menghitung skor dan mencocokkan hasil dengan bidang karier yang sesuai.
                        </small>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-text">
                        <b>Lihat Rekomendasi Karier</b><br>
                        <small>
                            Hasil rekomendasi karier terbaik akan ditampilkan berdasarkan skor tertinggi.
                        </small>
                    </div>
                </div>

                <div class="step mb-0">
                    <div class="step-number">5</div>
                    <div class="step-text">
                        <b>Evaluasi dan Pengembangan</b><br>
                        <small>
                            Gunakan hasil rekomendasi sebagai acuan untuk mengembangkan kemampuan Anda.
                        </small>
                    </div>
                </div>

            </div>

            <!-- HASIL -->
            <div class="section-card">
                <div class="section-title">Rekomendasi Terakhir</div>

                @if (isset($top3) && $top3->count() > 0)
                    @foreach ($top3 as $index => $item)
                        <div class="job-item">
                            <div>
                                <b>{{ $index + 1 }}. {{ $item->okupasi->nama_okupasi }}</b>
                            </div>
                            <div class="text-primary">
                                {{ number_format($item->skor, 1) }}%
                            </div>
                        </div>
                    @endforeach

                    <small class="text-muted">
                        Terakhir tes: {{ $tanggalTes ?? '-' }}
                    </small>
                @else
                    <div class="text-center">
                        <p class="text-muted">Belum ada hasil tes</p>
                        <a href="{{ route('screening.index') }}" class="btn btn-primary btn-sm">
                            Mulai Tes
                        </a>
                    </div>
                @endif

            </div>

        </div>

    </div>

    </div>

    </div>

@endsection
