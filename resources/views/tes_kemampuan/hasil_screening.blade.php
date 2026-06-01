@extends('layouts.template')

@section('content')

<style>
body{
    background:#f3f5f9;
    font-family:'Poppins',sans-serif;
}

/* ===== WRAPPER ===== */
.result-wrapper{
    padding:10px 5px 30px;
    max-width:1100px;
    margin:auto;
}

/* ===== TOP PROGRESS ===== */
.top-progress-wrapper{
    margin-bottom:24px;
}

.progress-info{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:10px;
    flex-wrap:wrap;
    gap:10px;
}

.progress-step{
    font-size:12px;
    font-weight:700;
    letter-spacing:1px;
    color:#64748b;
    text-transform:uppercase;
}

.custom-progress{
    height:8px;
    border-radius:999px;
    background:#e2e8f0;
    overflow:hidden;
}

.custom-bar{
    background:linear-gradient(90deg,#020817,#0f172a,#1e293b);
    border-radius:999px;
}

/* ===== HERO ===== */
.hero-card{
    background:linear-gradient(90deg,#020817,#0f172a,#1e293b);
    border-radius:24px;
    padding:32px 36px;
    color:white;
    margin-bottom:24px;
    box-shadow:0 8px 24px rgba(15,23,42,0.12);
}

.hero-card h1{
    font-size:34px;
    font-weight:700;
    margin-bottom:12px;
}

.hero-card p{
    font-size:15px;
    line-height:1.8;
    color:rgba(255,255,255,0.82);
    max-width:700px;
    margin-bottom:0;
}

/* ===== MAIN CARD ===== */
.main-card{
    background:white;
    border-radius:24px;
    border:1px solid #e5e7eb;
    padding:32px;
    box-shadow:0 10px 30px rgba(0,0,0,0.04);
}

/* ===== INFO ALERT ===== */
.info-alert{
    border:none;
    border-radius:18px;
    background:#f8fafc;
    color:#475569;
    padding:18px 20px;
    margin-bottom:30px;
    border-left:4px solid #0f172a;
    line-height:1.8;
}

/* ===== SECTION TITLE ===== */
.section-title{
    font-size:22px;
    font-weight:700;
    color:#111827;
    margin-bottom:24px;
}

/* ===== CLUSTER ITEM ===== */
.cluster-item{
    background:#f8fafc;
    border-radius:22px;
    padding:24px;
    margin-bottom:20px;
    border:1px solid #e5e7eb;
    transition:.25s;
}

.cluster-item:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(0,0,0,0.04);
}

.cluster-name{
    font-size:22px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:10px;
}

.area-badge{
    display:inline-flex;
    align-items:center;
    gap:6px;
    background:#eef2ff;
    color:#0f172a;
    padding:8px 16px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}

.cluster-description{
    margin-top:22px;
    font-size:14px;
    line-height:1.9;
    color:#64748b;
}

/* ===== SCORE BOX ===== */
.score-box{
    background:white;
    border-radius:18px;
    padding:18px 22px;
    text-align:center;
    min-width:120px;
    border:1px solid #e5e7eb;
}

.score-label{
    font-size:12px;
    color:#64748b;
    margin-bottom:6px;
    text-transform:uppercase;
    letter-spacing:1px;
    font-weight:600;
}

.score-value{
    font-size:28px;
    font-weight:700;
    color:#0f172a;
}

/* ===== BUTTON ===== */
.btn-test{
    background:#020817;
    color:white;
    border:none;
    border-radius:16px;
    padding:16px;
    font-weight:600;
    font-size:15px;
    transition:.25s;
}

.btn-test:hover{
    background:#111827;
    color:white;
    transform:translateY(-2px);
}

/* ===== RESPONSIVE ===== */
@media(max-width:768px){

    .hero-card{
        padding:24px;
    }

    .hero-card h1{
        font-size:26px;
    }

    .cluster-flex{
        flex-direction:column;
        align-items:flex-start !important;
        gap:18px;
    }

    .score-box{
        width:100%;
    }

    .main-card{
        padding:22px;
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

        @foreach($clusters as $cluster)

            <div class="cluster-item">

                <div class="d-flex justify-content-between align-items-center cluster-flex">

                    <div>

                        <div class="cluster-name">
                            {{ $cluster->nama_cluster }}
                        </div>

                        <div class="area-badge">
                            <i class="fas fa-layer-group"></i>
                            {{ $cluster->areaFungsi->nama_area_fungsi }}
                        </div>

                    </div>

                </div>

                <div class="cluster-description">

                    <b>Area Fungsi</b><br>
                    {{ $cluster->areaFungsi->deskripsi }}

                    <br><br>

                    <b>Penjelasan Cluster</b><br>
                    Cluster <b>{{ $cluster->nama_cluster }}</b>
                    direkomendasikan karena jawaban screening Anda menunjukkan
                    kecenderungan minat, pola berpikir, dan kemampuan yang sesuai
                    dengan karakteristik pekerjaan pada bidang tersebut.

                </div>

            </div>

        @endforeach

        <!-- BUTTON -->
        <div class="mt-4">

            <a href="{{ route('tes.kemampuan.soal', $clusterUtama->id_cluster_skill) }}"
               class="btn btn-test w-100">

                Mulai Tes Kompetensi
                <i class="fas fa-arrow-right ml-2"></i>

            </a>

        </div>

    </div>

</div>

@endsection