@extends('layouts.template')

@section('content')

<style>
body {
    background: #f4f7fb;
}

/* HEADER */
.step-text {
    font-size: 12px;
    color: #6c757d;
    letter-spacing: 1px;
}

.title-main {
    font-weight: 700;
    font-size: 20px;
}

.sub-text {
    font-size: 13px;
    color: #6c757d;
}

/* PROGRESS */
.progress {
    height: 6px;
    border-radius: 10px;
}

.progress-bar {
    background: #0d6efd;
}

/* GROUP */
.group-title {
    font-weight: 600;
    font-size: 14px;
    margin: 25px 0 10px;
}

.group-title span {
    font-size: 11px;
    color: #6c757d;
    margin-left: 10px;
}

/* CARD */
.cluster-card {
    border-radius: 18px;
    padding: 18px;
    background: #fff;
    border: 2px solid transparent;
    transition: 0.25s;
    position: relative;
    cursor: pointer;
    height: 100%;
}

.cluster-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* ACTIVE */
.cluster-card.active {
    border-color: #0d6efd;
    box-shadow: 0 10px 30px rgba(13,110,253,0.2);
}

/* ICON */
.icon-box {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    background: #eef4ff;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0d6efd;
    margin-bottom: 10px;
}

/* TITLE */
.cluster-title {
    font-weight: 600;
    font-size: 14px;
}

/* DESC */
.cluster-desc {
    font-size: 12px;
    color: #6c757d;
    margin: 8px 0;
}

/* TAG */
.tag {
    font-size: 10px;
    background: #eef4ff;
    color: #0d6efd;
    border-radius: 50px;
    padding: 3px 8px;
    margin-right: 5px;
}

/* CHECK ICON */
.check {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #0d6efd;
    color: white;
    border-radius: 50%;
    width: 22px;
    height: 22px;
    display: none;
    align-items: center;
    justify-content: center;
    font-size: 12px;
}

.cluster-card.active .check {
    display: flex;
}

/* FLOATING ACTION */
.floating-box {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: white;
    border-radius: 16px;
    padding: 15px 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    display: flex;
    align-items: center;
    gap: 15px;
}

.btn-next {
    background: #0d6efd;
    color: white;
    border-radius: 30px;
    padding: 8px 20px;
    border: none;
}

.btn-next:disabled {
    background: #adb5bd;
    cursor: not-allowed;
}

.btn-back {
    border-radius: 30px;
    padding: 8px 20px;
    border: 1px solid #dee2e6;
    background: white;
}
</style>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="mb-3">
        <div class="step-text">LANGKAH 2 DARI 3</div>
        <div class="title-main">Pilih Cluster Skill</div>
        <div class="sub-text">
            Pilih 1 bidang yang paling sesuai dengan minatmu
        </div>
    </div>

    <!-- PROGRESS -->
    <div class="progress mb-4">
        <div class="progress-bar" style="width: 66%"></div>
    </div>

    <!-- GROUP TITLE -->
    <div class="group-title">
        {{ $area->nama_area_fungsi }}
        <span>Pilih 1</span>
    </div>

    <!-- CARD LIST -->
    <div class="row">
        @foreach($cluster as $item)
        <div class="col-md-4 mb-4">
            <div class="cluster-card"
                 onclick="selectCluster(this, {{ $item->id_cluster_skill }})">

                <!-- CHECK -->
                <div class="check">✓</div>

                <!-- ICON -->
                <div class="icon-box">
                    <i class="fas fa-code"></i>
                </div>

                <!-- TITLE -->
                <div class="cluster-title">
                    {{ $item->nama_cluster }}
                </div>

                <!-- DESC -->
                <div class="cluster-desc">
                    {{ $item->deskripsi ?? 'Deskripsi cluster belum tersedia.' }}
                </div>

                <!-- TAG -->
                <div>
                    <span class="tag">Skill</span>
                    <span class="tag">Tech</span>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>

<!-- FLOATING ACTION -->
<div class="floating-box">
    <div style="font-size:12px;">
        <b id="count">0</b>/1 Dipilih
    </div>

    <button class="btn-back" onclick="history.back()">Kembali</button>

    <button class="btn-next" id="btnNext" onclick="goNext()" disabled>
        Lanjut →
    </button>
</div>

<script>
let selected = null;

// pilih 1 cluster saja
function selectCluster(el, id) {

    // reset semua
    document.querySelectorAll('.cluster-card')
        .forEach(c => c.classList.remove('active'));

    // set active
    el.classList.add('active');
    selected = id;

    // update counter
    document.getElementById('count').innerText = 1;

    // aktifkan tombol lanjut
    document.getElementById('btnNext').disabled = false;
}

// redirect ke halaman berikutnya
function goNext() {
    if (selected) {
        window.location.href = "/tes-kemampuan/cluster/" + selected;
    }
}
</script>

@endsection