@extends('layouts.template')
@section('content')

<style>
    body{
        background:#f3f5f9;
        font-family:'Poppins',sans-serif;
    }

    /* ===== WRAPPER ===== */
    .dashboard-wrapper{
        padding:5px 0 20px;
    }

    /* ===== HERO ===== */
    .hero-card{
        background:linear-gradient(90deg,#020817,#0f172a,#1e293b);
        border-radius:20px;
        padding:24px 28px;
        color:white;
        min-height:150px;
        display:flex;
        align-items:center;
        box-shadow:0 6px 18px rgba(15,23,42,0.10);
    }

    .hero-card h1{
        font-size:28px;
        font-weight:700;
        margin-bottom:8px;
        line-height:1.2;
    }

    .hero-card p{
        font-size:14px;
        line-height:1.7;
        color:rgba(255,255,255,0.82);
        max-width:620px;
        margin-bottom:0;
    }

    .btn-start{
        margin-top:16px;
        background:white;
        border:none;
        border-radius:40px;
        padding:10px 20px;
        font-weight:600;
        color:#111827;
        transition:.3s;
        font-size:13px;
    }

    .btn-start:hover{
        transform:translateY(-2px);
        background:#f8fafc;
    }

    /* ===== INFO CARD ===== */
    .info-card{
        background:white;
        border-radius:18px;
        padding:20px;
        display:flex;
        align-items:center;
        gap:14px;
        border:1px solid #e5e7eb;
        transition:.25s;
        height:100%;
    }

    .info-card:hover{
        transform:translateY(-3px);
        box-shadow:0 8px 18px rgba(0,0,0,0.04);
    }

    .info-icon{
        width:52px;
        height:52px;
        border-radius:50%;
        background:#eef2ff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:18px;
        color:#0f172a;
        flex-shrink:0;
    }

    .info-label{
        font-size:11px;
        text-transform:uppercase;
        letter-spacing:.8px;
        color:#64748b;
        font-weight:600;
        margin-bottom:4px;
    }

    .info-value{
        font-size:22px;
        font-weight:700;
        color:#0f172a;
        line-height:1.2;
    }

    /* ===== SECTION CARD ===== */
    .section-card{
        background:white;
        border-radius:20px;
        border:1px solid #e5e7eb;
        padding:24px;
        height:100%;
    }

    .section-title{
        font-size:18px;
        font-weight:700;
        color:#111827;
        margin-bottom:24px;
    }

    /* ===== STEP ===== */
    .step{
        display:flex;
        gap:14px;
        position:relative;
        padding-bottom:22px;
    }

    .step:last-child{
        padding-bottom:0;
    }

    .step:last-child .step-line{
        display:none;
    }

    .step-left{
        position:relative;
    }

    .step-number{
        width:34px;
        height:34px;
        border-radius:50%;
        background:#0f172a;
        color:white;
        font-size:13px;
        font-weight:700;
        display:flex;
        align-items:center;
        justify-content:center;
        position:relative;
        z-index:2;
    }

    .step-line{
        width:2px;
        height:100%;
        background:#dbe3ef;
        position:absolute;
        left:16px;
        top:34px;
    }

    .step-title{
        font-size:15px;
        font-weight:600;
        color:#111827;
        margin-bottom:4px;
    }

    .step-desc{
        color:#64748b;
        line-height:1.6;
        font-size:13px;
    }

    /* ===== EMPTY STATE ===== */
    .empty-state{
        border:2px dashed #d1d5db;
        border-radius:20px;
        padding:40px 24px;
        text-align:center;
        min-height:360px;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
    }

    .empty-icon{
        width:72px;
        height:72px;
        border-radius:50%;
        background:#eef2ff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:28px;
        color:#64748b;
        margin-bottom:20px;
    }

    .empty-title{
        font-size:22px;
        font-weight:700;
        color:#111827;
        margin-bottom:10px;
    }

    .empty-text{
        max-width:420px;
        color:#64748b;
        line-height:1.7;
        font-size:14px;
        margin-bottom:22px;
    }

    .btn-dark-custom{
        background:#020817;
        color:white;
        border:none;
        border-radius:12px;
        padding:12px 24px;
        font-size:14px;
        font-weight:600;
        transition:.25s;
    }

    .btn-dark-custom:hover{
        background:#111827;
        color:white;
    }

    /* ===== RESULT ITEM ===== */
    .job-item{
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding:14px 16px;
        border-radius:14px;
        background:#f8fafc;
        margin-bottom:12px;
        transition:.25s;
    }

    .job-item:hover{
        background:#eef2ff;
        transform:translateX(3px);
    }

    .job-name{
        font-size:14px;
        font-weight:600;
        color:#111827;
    }

    .job-score{
        font-size:16px;
        font-weight:700;
        color:#0f172a;
    }

    /* ===== RESPONSIVE ===== */
    @media(max-width:992px){

        .hero-card{
            padding:20px;
            min-height:auto;
        }

        .hero-card h1{
            font-size:24px;
        }

        .hero-card p{
            font-size:13px;
        }

        .section-card{
            margin-bottom:18px;
        }

        .empty-state{
            min-height:auto;
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

        <div class="col-md-4 mb-3">
            <div class="info-card">

                <div class="info-icon">
                    <i class="fas fa-check"></i>
                </div>

                <div>
                    <div class="info-label">Status Tes</div>

                    <div class="info-value">
                        {{ isset($top3) ? 'Sudah Tes' : 'Belum Tes' }}
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4 mb-3">
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

        <div class="col-md-4 mb-3">
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
                    Panduan Penggunaan Sistem
                </div>

                <div class="step">

                    <div class="step-left">
                        <div class="step-number">1</div>
                        <div class="step-line"></div>
                    </div>

                    <div>
                        <div class="step-title">Mulai Tes Kompetensi</div>

                        <div class="step-desc">
                            Klik tombol "Mulai Tes" untuk membuka modul evaluasi awal.
                        </div>
                    </div>

                </div>

                <div class="step">

                    <div class="step-left">
                        <div class="step-number" style="background:#dbeafe;color:#0f172a;">2</div>
                        <div class="step-line"></div>
                    </div>

                    <div>
                        <div class="step-title">Jawab Pertanyaan Screening</div>

                        <div class="step-desc">
                            Berikan jawaban jujur mengenai preferensi dan minat kerja Anda.
                        </div>
                    </div>

                </div>

                <div class="step">

                    <div class="step-left">
                        <div class="step-number" style="background:#dbeafe;color:#0f172a;">3</div>
                        <div class="step-line"></div>
                    </div>

                    <div>
                        <div class="step-title">Sistem Memproses Hasil</div>

                        <div class="step-desc">
                            Algoritma sistem akan menganalisis data Anda secara real-time.
                        </div>
                    </div>

                </div>

                <div class="step">

                    <div class="step-left">
                        <div class="step-number" style="background:#dbeafe;color:#0f172a;">4</div>
                        <div class="step-line"></div>
                    </div>

                    <div>
                        <div class="step-title">Lihat Rekomendasi Karier</div>

                        <div class="step-desc">
                            Dapatkan daftar karier yang paling sesuai dengan kemampuan Anda.
                        </div>
                    </div>

                </div>

                <div class="step">

                    <div class="step-left">
                        <div class="step-number" style="background:#dbeafe;color:#0f172a;">5</div>
                    </div>

                    <div>
                        <div class="step-title">Evaluasi dan Pengembangan Diri</div>

                        <div class="step-desc">
                            Gunakan hasil rekomendasi sebagai acuan pengembangan skill.
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

                @if(isset($top3) && $top3->count() > 0)

                    @foreach($top3 as $index => $item)

                        <div class="job-item">

                            <div class="job-name">
                                {{ $index + 1 }}. {{ $item->okupasi->nama_okupasi }}
                            </div>

                            <div class="job-score">
                                {{ number_format($item->skor,1) }}%
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

                        <a href="{{ route('screening.index') }}"
                           class="btn btn-dark-custom">
                            Mulai Tes Sekarang
                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection