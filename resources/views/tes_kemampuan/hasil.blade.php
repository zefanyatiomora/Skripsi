@extends('layouts.template')

@section('content')

@php use Illuminate\Support\Str; @endphp

<style>
body {
    background: #f1f5f9;
}

/* TITLE */
.title-main {
    font-size: 28px;
    font-weight: 700;
    color: #1e293b;
}

/* INFO BOX */
.info-box {
    background: #eef4ff;
    border-radius: 14px;
    padding: 16px;
    font-size: 13px;
    color: #475569;
}

/* CARD */
.card-career {
    border-radius: 20px;
    padding: 22px;
    background: #f8fafc;
    transition: 0.25s;
    position: relative;
}

.card-career:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
}

/* VARIANT WARNA */
.card-blue { border: 2px solid #2563eb; }
.card-gray { border: 2px solid transparent; }
.card-orange { border: 2px solid #fb923c; }

/* BADGE */
.badge-main {
    position: absolute;
    top: -12px;
    left: 20px;
    background: #2563eb;
    color: white;
    font-size: 11px;
    padding: 6px 12px;
    border-radius: 20px;
}

/* ICON */
.icon-box {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
}

.icon-blue { background: #e0ecff; color: #2563eb; }
.icon-gray { background: #e5e7eb; color: #6b7280; }
.icon-orange { background: #ffe7d6; color: #fb923c; }

/* TEXT */
.job-title {
    font-weight: 600;
    font-size: 17px;
    color: #1e293b;
}

.job-sub {
    font-size: 12px;
    color: #64748b;
}

/* PROGRESS */
.progress {
    height: 6px;
    border-radius: 10px;
    background: #e2e8f0;
}

.progress-blue { background: linear-gradient(90deg,#2563eb,#3b82f6); }
.progress-gray { background: #6b7280; }
.progress-orange { background: #fb923c; }

/* DESC */
.desc {
    font-size: 12px;
    color: #6b7280;
    margin-top: 8px;
    min-height: 60px;
}

/* BUTTON */
.btn-detail {
    border-radius: 30px;
    font-size: 13px;
    padding: 7px 14px;
    width: 100%;
    margin-top: 10px;
}

.btn-blue {
    border:1px solid #2563eb;
    color:#2563eb;
}
.btn-blue:hover {
    background:#2563eb;
    color:white;
}

.btn-gray {
    border:1px solid #d1d5db;
    color:#374151;
}
.btn-gray:hover {
    background:#374151;
    color:white;
}

.btn-orange {
    border:1px solid #fb923c;
    color:#fb923c;
}
.btn-orange:hover {
    background:#fb923c;
    color:white;
}
</style>

<div class="container mt-4">

    <!-- TITLE -->
    <div class="title-main mb-3">
        Hasil Rekomendasi Karier
    </div>

    @php $max = $hasil[0]['persen'] ?? 0; @endphp

    <div class="row">

        @foreach($hasil as $index => $item)

        @php
            // warna berdasarkan ranking
            if($index == 0){
                $cardClass = 'card-blue';
                $iconClass = 'icon-blue';
                $progressClass = 'progress-blue';
                $btnClass = 'btn-blue';
            } elseif($index == 1){
                $cardClass = 'card-gray';
                $iconClass = 'icon-gray';
                $progressClass = 'progress-gray';
                $btnClass = 'btn-gray';
            } else {
                $cardClass = 'card-orange';
                $iconClass = 'icon-orange';
                $progressClass = 'progress-orange';
                $btnClass = 'btn-orange';
            }
        @endphp

        <div class="col-md-4 mb-4">

            <div class="card-career {{ $cardClass }}">

                @if($index == 0)
                    <div class="badge-main">Rekomendasi Utama</div>
                @endif

                <!-- ICON -->
                <div class="icon-box {{ $iconClass }}">
                    <i class="fas fa-briefcase"></i>
                </div>

                <!-- TITLE -->
                <div class="job-title">
                    {{ $item['okupasi']->nama_okupasi }}
                </div>

                <div class="job-sub mb-2">
                    {{ $cluster->nama_cluster }}
                </div>

                <!-- SCORE -->
                <div class="d-flex justify-content-between">
                    <small>Kecocokan</small>
                    <small><b>{{ number_format($item['persen'],1) }}%</b></small>
                </div>

                <!-- PROGRESS -->
                <div class="progress mb-2">
                    <div class="progress-bar {{ $progressClass }}"
                         style="width: {{ $item['persen'] }}%">
                    </div>
                </div>

                <!-- DESC -->
                <div class="desc">
                    {{ Str::limit($item['okupasi']->deskripsi, 90) }}
                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection