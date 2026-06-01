@extends('layouts.template')

@section('content')

@php use Illuminate\Support\Str; @endphp

<style>
body{
    background:#f4f7fb;
    font-family:'Poppins',sans-serif;
    color:#111827;
}
/* =========================
    WRAPPER
========================= */
.career-wrapper{
    max-width:1150px;
    margin:auto;
    padding:12px 10px 40px;
}
/* =========================
    HERO
========================= */
.hero-section{
    background:linear-gradient(90deg,#020817,#0f172a,#1e293b);
    border-radius:20px;
    padding:28px 32px;
    color:white;
    position:relative;
    overflow:hidden;
    margin-bottom:24px;
    box-shadow:0 8px 24px rgba(15,23,42,0.08);
}

.hero-section::after{
    content:'';
    position:absolute;
    width:220px;
    height:220px;
    border-radius:50%;
    background:rgba(255,255,255,0.04);
    top:-70px;
    right:-70px;
}
.hero-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:7px 14px;
    border-radius:999px;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.08);
    font-size:11px;
    font-weight:600;
    letter-spacing:.5px;
    margin-bottom:16px;
}
.hero-title{
    font-size:30px;
    font-weight:700;
    line-height:1.3;
    margin-bottom:10px;
    max-width:620px;
}
.hero-subtitle{
    font-size:14px;
    line-height:1.8;
    color:rgba(255,255,255,0.75);
    max-width:700px;
    margin-bottom:20px;
}

.hero-progress{
    display:flex;
    align-items:center;
    gap:12px;
    flex-wrap:wrap;
}

.status{
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.06);
    padding:10px 14px;
    border-radius:12px;
    font-size:13px;
    font-weight:500;
}

.line{
    width:90px;
    height:6px;
    border-radius:999px;
    background:rgba(255,255,255,0.15);
    overflow:hidden;
}

.line span{
    display:block;
    width:100%;
    height:100%;
    background:white;
}

/* =========================
    SUMMARY
========================= */
.summary-card{
    background:white;
    border:1px solid #e5e7eb;
    border-radius:18px;
    padding:20px;
    display:flex;
    align-items:center;
    gap:16px;
    height:100%;
    transition:.2s ease;
}

.summary-card:hover{
    transform:translateY(-2px);
    box-shadow:0 6px 18px rgba(15,23,42,0.05);
}

.summary-icon{
    width:54px;
    height:54px;
    border-radius:14px;
    background:#eef2ff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
    color:#0f172a;
    flex-shrink:0;
}

.summary-label{
    font-size:11px;
    font-weight:600;
    text-transform:uppercase;
    letter-spacing:.7px;
    color:#64748b;
    margin-bottom:5px;
}

.summary-value{
    font-size:20px;
    font-weight:700;
    color:#0f172a;
    line-height:1.3;
}

/* =========================
    SECTION TITLE
========================= */
.section-title{
    font-size:20px;
    font-weight:700;
    color:#111827;
    margin-bottom:18px;
}

/* =========================
    CAREER CARD
========================= */
.career-card{
    background:white;
    border:1px solid #e5e7eb;
    border-radius:20px;
    padding:24px;
    margin-bottom:18px;
    position:relative;
    transition:.25s ease;
}

.career-card:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 22px rgba(15,23,42,0.05);
}

.career-card.primary{
    border:1.5px solid #0f172a;
}

.recommend-badge{
    position:absolute;
    top:0;
    right:0;
    background:#020817;
    color:white;
    padding:8px 14px;
    border-bottom-left-radius:14px;
    font-size:10px;
    font-weight:700;
    letter-spacing:.6px;
}

.career-top{
    gap:20px;
}

.rank-badge{
    width:52px;
    height:52px;
    border-radius:14px;
    background:#020817;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:16px;
    font-weight:700;
    flex-shrink:0;
}

.job-title{
    font-size:22px;
    font-weight:700;
    margin-bottom:10px;
    color:#111827;
}

.job-meta{
    display:flex;
    flex-wrap:wrap;
    gap:8px;
    margin-bottom:14px;
}

.meta-badge{
    background:#eef2ff;
    color:#1e293b;
    padding:6px 12px;
    border-radius:999px;
    font-size:11px;
    font-weight:600;
}

.match-text{
    font-size:13px;
    color:#64748b;
    margin-bottom:8px;
}

.match-text span{
    font-size:20px;
    font-weight:700;
    color:#020817;
}

.progress{
    height:8px;
    background:#e2e8f0;
    border-radius:999px;
    overflow:hidden;
    margin-bottom:16px;
}

.progress-bar{
    background:linear-gradient(90deg,#020817,#334155);
}

.job-desc{
    font-size:14px;
    line-height:1.8;
    color:#64748b;
    margin-bottom:18px;
}

.skill-tags{
    display:flex;
    flex-wrap:wrap;
    gap:8px;
    margin-bottom:20px;
}

.skill-tag{
    padding:6px 12px;
    border-radius:999px;
    background:#f8fafc;
    border:1px solid #e5e7eb;
    font-size:11px;
    font-weight:600;
    color:#475569;
}

.btn-career{
    background:#020817;
    color:white;
    border:none;
    border-radius:12px;
    padding:11px 18px;
    font-size:13px;
    font-weight:600;
    transition:.2s ease;
}

.btn-career:hover{
    background:#111827;
    transform:translateY(-1px);
}

/* =========================
    MOBILE
========================= */
@media(max-width:768px){

    .career-wrapper{
        padding:8px 4px 24px;
    }

    .hero-section{
        padding:24px;
    }

    .hero-title{
        font-size:24px;
    }

    .hero-subtitle{
        font-size:13px;
    }

    .summary-value{
        font-size:18px;
    }

    .career-top{
        flex-direction:column;
        align-items:flex-start !important;
    }

    .job-title{
        font-size:20px;
    }

    .hero-progress{
        flex-direction:column;
        align-items:flex-start;
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
    <div class="row mb-2">

        <div class="col-md-4 mb-3">

            <div class="summary-card">

                <div class="summary-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

                <div>
                    <div class="summary-label">
                        Cluster Skill
                    </div>

                    <div class="summary-value">
                        {{ $cluster->nama_cluster }}
                    </div>
                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="summary-card">

                <div class="summary-icon">
                    <i class="fas fa-chart-line"></i>
                </div>

                <div>
                    <div class="summary-label">
                        Kecocokan Tertinggi
                    </div>

                    <div class="summary-value">
                        {{ number_format($hasil[0]['persen'] ?? 0,1) }}%
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- RESULT -->
    <div class="section-title">
        Hasil Rekomendasi
    </div>

    @foreach($hasil as $index => $item)

    <div class="career-card {{ $index == 0 ? 'primary' : '' }}">

        @if($index == 0)
            <div class="recommend-badge">
                <i class="fas fa-star mr-1"></i>
                REKOMENDASI UTAMA
            </div>
        @endif

        <div class="d-flex gap-4 align-items-start career-top">

            <!-- RANK -->
            <div class="rank-badge">
                #{{ $index + 1 }}
            </div>

            <!-- CONTENT -->
            <div class="flex-grow-1">

                <div class="job-title">
                    {{ $item['okupasi']->nama_okupasi }}
                </div>

                <div class="job-meta">

                    <div class="meta-badge">
                        {{ $cluster->nama_cluster }}
                    </div>

                </div>

                <div class="match-text">
                    Match Score:
                    <span>{{ number_format($item['persen'],1) }}%</span>
                </div>

                <div class="progress">
                    <div class="progress-bar"
                         style="width:{{ $item['persen'] }}%">
                    </div>
                </div>

                <div class="job-desc">
                    {{ Str::limit($item['okupasi']->deskripsi, 240) }}
                </div>

                <div class="skill-tags">

                    <div class="skill-tag">
                        Teknologi
                    </div>

                    <div class="skill-tag">
                        Problem Solving
                    </div>

                    <div class="skill-tag">
                        Career Growth
                    </div>

                    <div class="skill-tag">
                        Digital Skill
                    </div>

                </div>

                <button class="btn-career">
                    Lihat Detail Karier
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>

            </div>

        </div>

    </div>

    @endforeach

</div>

@endsection