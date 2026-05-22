@extends('layouts.template')

@section('content')

<style>
body{
    background:#f4f7fb;
}

.result-wrapper{
    max-width:950px;
    margin:auto;
}

.result-card{
    border:none;
    border-radius:22px;
    background:white;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
    overflow:hidden;
}

.result-header{
    background:linear-gradient(135deg,#1e3a8a,#2563eb);
    color:white;
    padding:35px;
}

.result-header h2{
    font-weight:700;
    margin-bottom:10px;
}

.info-alert{
    border:none;
    border-radius:14px;
    background:#eef4ff;
    color:#1e40af;
    padding:16px;
}

.section-title{
    font-size:18px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:18px;
}

.cluster-item{
    background:#f8fafc;
    border-radius:18px;
    padding:18px;
    margin-bottom:16px;
    border:1px solid #e5e7eb;
}

.cluster-name{
    font-size:18px;
    font-weight:700;
    color:#0f172a;
}

.area-badge{
    display:inline-block;
    background:#dbeafe;
    color:#2563eb;
    padding:6px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:600;
    margin-top:8px;
}

.cluster-description{
    margin-top:15px;
    font-size:14px;
    line-height:1.8;
    color:#64748b;
}

.score-box{
    background:white;
    border-radius:12px;
    padding:12px 18px;
    text-align:center;
    min-width:100px;
    border:1px solid #e5e7eb;
}

.score-box h4{
    margin:0;
    color:#2563eb;
    font-weight:700;
}

.btn-test{
    border-radius:14px;
    padding:15px;
    font-weight:600;
    font-size:15px;
}

@media(max-width:768px){

    .result-header{
        padding:25px;
    }

    .cluster-flex{
        flex-direction:column;
        align-items:flex-start !important;
        gap:15px;
    }

    .score-box{
        width:100%;
    }
}
</style>

<div class="container py-4">

    <div class="result-wrapper">

        <div class="result-card">

            <!-- HEADER -->
            <div class="result-header">

                <h2>
                    Hasil Screening Karier TI
                </h2>

                <p class="mb-0">
                    Sistem menemukan bidang yang paling sesuai
                    berdasarkan minat dan kecenderungan kemampuan Anda.
                </p>

            </div>

            <!-- CONTENT -->
            <div class="p-4">

                <div class="alert info-alert mb-4">
                    Berikut merupakan cluster skill dan area fungsi
                    yang direkomendasikan berdasarkan hasil screening Anda.
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
                                    {{ $cluster->areaFungsi->nama_area_fungsi }}
                                </div>

                            </div>

                            <div class="score-box">

                                <small class="text-muted">
                                    Skor
                                </small>

                            </div>

                        </div>

                        <div class="cluster-description">

                            <b>Area Fungsi:</b><br>
                            {{ $cluster->areaFungsi->deskripsi }}

                            <br><br>

                            <b>Penjelasan Cluster:</b><br>
                            Cluster <b>{{ $cluster->nama_cluster }}</b>
                            direkomendasikan karena jawaban screening Anda
                            menunjukkan kecenderungan minat dan kemampuan
                            pada aktivitas, kompetensi, dan karakteristik
                            pekerjaan di bidang tersebut.

                        </div>

                    </div>

                @endforeach

                <!-- BUTTON -->
                <div class="mt-4">

                    <a href="{{ route('tes.kemampuan.soal', $clusterUtama->id_cluster_skill) }}"
                       class="btn btn-primary btn-test w-100">

                        Mulai Tes Kompetensi
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection