@extends('layouts.template')

@section('content')

<style>
body {
    background: #f4f7fb;
}

.container {
    max-width: 900px;
}

/* PROGRESS */
.top-bar {
    margin-bottom: 20px;
}

.progress {
    height: 6px;
    border-radius: 10px;
}

.progress-bar {
    background: #0d6efd;
}

.page-info {
    font-size: 12px;
    color: #6c757d;
    text-align: right;
}

/* TITLE */
.title-main {
    font-size: 24px;
    font-weight: 700;
    margin-top: 15px;
}

.subtitle {
    font-size: 13px;
    color: #6c757d;
}

/* QUESTION CARD */
.question-card {
    background: #fff;
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.05);
    margin-bottom: 20px;
}

/* NUMBER BADGE */
.number {
    width: 30px;
    height: 30px;
    background: #eef4ff;
    color: #0d6efd;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    margin-right: 10px;
}

/* TEXT */
.question-text {
    font-size: 14px;
    font-weight: 500;
    color: #2c3e50;
    display: flex;
    align-items: flex-start;
}

/* OPTIONS */
.option-wrapper {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

.option-item {
    flex: 1;
}

input[type="radio"] {
    display: none;
}

.option-label {
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 12px;
    text-align: center;
    cursor: pointer;
    font-size: 13px;
    transition: 0.2s;
    position: relative;
}

/* HOVER */
.option-label:hover {
    border-color: #0d6efd;
}

/* ACTIVE */
input[type="radio"]:checked + .option-label {
    border-color: #0d6efd;
    background: #eef4ff;
    font-weight: 600;
}

/* ICON CHECK */
.option-label::after {
    content: "";
    position: absolute;
    right: 10px;
    top: 10px;
    font-size: 12px;
    display: none;
}

input[value="1"]:checked + .option-label::after {
    content: "✓";
    color: #0d6efd;
    display: block;
}

input[value="0"]:checked + .option-label::after {
    content: "✕";
    color: #dc3545;
    display: block;
}

/* BUTTON */
.btn-submit {
    border-radius: 50px;
    padding: 14px;
    font-size: 15px;
    font-weight: 600;
    background: #0d1b3e;
    border: none;
}

/* MOBILE */
@media (max-width: 576px) {
    .option-wrapper {
        flex-direction: column;
    }
}
</style>

<div class="container py-3">

    <!-- TOP -->
    <div class="top-bar">
        <div class="progress mb-2">
            <div class="progress-bar" style="width: 70%"></div>
        </div>

        <div class="page-info">
            Halaman 5 dari 8
        </div>
    </div>

    <!-- TITLE -->
    <div class="title-main">
        Uji Kompetensi Teknis
    </div>

    <div class="subtitle mb-3">
        Pertanyaan disesuaikan dengan cluster skill yang dipilih
    </div>

    <form action="{{ route('tes.kemampuan.submit') }}" method="POST">
        @csrf

        <input type="hidden" name="id_cluster" value="{{ $cluster->id_cluster_skill }}">

        @foreach($kompetensi as $i => $k)
        <div class="question-card">

            <div class="question-text">
                <div class="number">{{ $i+1 }}</div>

                <div>
                    {{ $k->kompetensi }}
                </div>
            </div>

            <div class="option-wrapper">

                <!-- YA -->
                <div class="option-item">
                    <label>
                        <input type="radio"
                               name="jawaban[{{ $k->id_kompetensi }}]"
                               value="1" required>

                        <div class="option-label">
                            Ya, Saya Mampu
                        </div>
                    </label>
                </div>

                <!-- TIDAK -->
                <div class="option-item">
                    <label>
                        <input type="radio"
                               name="jawaban[{{ $k->id_kompetensi }}]"
                               value="0" required>

                        <div class="option-label">
                            Belum Mampu
                        </div>
                    </label>
                </div>

            </div>

        </div>
        @endforeach

        <!-- SUBMIT -->
        <div class="mt-4">
            <button class="btn btn-submit w-100 text-white">
                Langkah Berikutnya →
            </button>
        </div>

    </form>

</div>

@endsection