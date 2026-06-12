@extends('layouts.template')

@section('content')
    <style>
        body {
            background: #f4f7fb;
            font-family: 'Poppins', sans-serif;
        }

        /* ===== CONTAINER ===== */
        .container {
            max-width: 760px;
        }

        /* ===== PROGRESS ===== */
        .top-progress-wrapper {
            margin-bottom: 16px;
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
            background: linear-gradient(90deg, #020817, #0f172a);
            border-radius: 999px;
        }

        /* ===== TITLE ===== */
        .title-main {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            margin-top: 8px;
        }

        .subtitle {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
            margin-bottom: 18px;
        }

        /* ===== QUESTION CARD ===== */
        .question-card {
            background: #fff;
            border-radius: 16px;
            padding: 18px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
            margin-bottom: 14px;
            border: 1px solid #e5e7eb;
            transition: .2s;
        }

        .question-card:hover {
            transform: translateY(-1px);
        }

        /* ===== NUMBER ===== */
        .number {
            width: 30px;
            height: 30px;
            background: #eef4ff;
            color: #0d6efd;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 13px;
            margin-right: 10px;
            flex-shrink: 0;
        }

        /* ===== QUESTION ===== */
        .question-text {
            font-size: 14px;
            font-weight: 600;
            color: #1e293b;
            display: flex;
            align-items: flex-start;
            line-height: 1.6;
        }

        /* ===== OPTIONS ===== */
        .option-wrapper {
            display: flex;
            justify-content: center;
            gap: 14px;
            margin-top: 16px;
        }

        .option-item {
            width: 140px;
            flex: none;
        }

        .option-item input[type="radio"] {
            display: none;
        }

        .option-label {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 10px 14px;
            text-align: center;
            cursor: pointer;
            font-size: 13px;
            transition: .2s;
            position: relative;
            background: white;
            font-weight: 500;
        }

        .option-label:hover {
            border-color: #0d6efd;
        }

        .option-item input[type="radio"]:checked+.option-label {
            border-color: #0d6efd;
            background: #eef4ff;
            font-weight: 600;
        }

        .option-label::after {
            position: absolute;
            right: 10px;
            top: 8px;
            font-size: 11px;
            display: none;
        }

        input[value="1"]:checked+.option-label::after {
            content: "✓";
            color: #0d6efd;
            display: block;
        }

        input[value="0"]:checked+.option-label::after {
            content: "✕";
            color: #dc3545;
            display: block;
        }

        /* ===== BUTTON ===== */
        .btn-submit {
            border-radius: 12px;
            padding: 12px;
            font-size: 14px;
            font-weight: 600;
            background: #020817;
            border: none;
            transition: .2s;
            box-shadow: none;
        }

        .btn-submit:hover {
            background: #111827;
            transform: translateY(-1px);
        }

        /* ===== POPUP ===== */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.55);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .popup-box {
            background: white;
            width: 90%;
            max-width: 360px;
            border-radius: 18px;
            padding: 24px;
            text-align: center;
            animation: popupShow .25s ease;
        }

        .popup-icon {
            width: 60px;
            height: 60px;
            margin: auto auto 14px;
            border-radius: 50%;
            background: #fee2e2;
            color: #dc2626;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
        }

        .popup-box h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #0f172a;
        }

        .popup-box p {
            color: #475569;
            line-height: 1.6;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .popup-btn {
            border: none;
            background: #020817;
            color: white;
            padding: 10px 22px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
        }

        .popup-btn:hover {
            background: #111827;
        }

        .spinner-box {
            display: flex;
            justify-content: center;
            margin-bottom: 16px;
        }

        @keyframes popupShow {
            from {
                transform: scale(.9);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* ===== MOBILE ===== */
        @media (max-width: 576px) {

            .container {
                max-width: 100%;
            }

            .title-main {
                font-size: 20px;
            }

            .question-card {
                padding: 15px;
            }

            .option-wrapper {
                flex-direction: column;
                gap: 10px;
            }

            .option-item {
                width: 100%;
            }

            .option-label {
                padding: 12px;
            }

            .number {
                width: 28px;
                height: 28px;
                font-size: 12px;
            }

            .question-text {
                font-size: 13px;
            }
        }
    </style>

    <!-- TOP BAR -->
    <div class="top-progress-wrapper">

        <div class="progress-info">
            <div class="progress-step">
                LANGKAH 3 DARI 3
            </div>
        </div>

        <div class="progress custom-progress">
            <div class="progress-bar custom-bar" style="width:100%"></div>
        </div>

    </div>

    <div class="container py-3">

        <!-- TITLE -->
        <div class="title-main">
            Uji Kompetensi Teknis
        </div>

        <div class="subtitle mb-4">
            Pertanyaan disesuaikan dengan cluster skill yang dipilih
        </div>

        <!-- FORM -->
        <form action="{{ route('tes.kemampuan.submit') }}" method="POST" id="kompetensiForm" novalidate>

            @csrf

            @foreach ($clusters as $cluster)
                <input type="hidden" name="id_cluster[]" value="{{ $cluster->id_cluster_skill }}">
            @endforeach
            @foreach ($kompetensi as $i => $k)
                <div class="question-card" id="question-{{ $i + 1 }}">

                    <div class="question-text">

                        <div class="number">
                            {{ $i + 1 }}
                        </div>

                        <div>
                            {{ $k->pertanyaan_kompetensi }}
                        </div>

                    </div>

                    <!-- OPTIONS -->
                    <div class="option-wrapper">

                        <!-- YA -->
                        <div class="option-item">

                            <label>

                                <input type="radio" name="jawaban[{{ $k->id_kompetensi }}]" value="1">

                                <div class="option-label">
                                    Benar
                                </div>

                            </label>

                        </div>

                        <!-- TIDAK -->
                        <div class="option-item">

                            <label>

                                <input type="radio" name="jawaban[{{ $k->id_kompetensi }}]" value="0">

                                <div class="option-label">
                                    Tidak Benar
                                </div>

                            </label>

                        </div>

                    </div>

                </div>
            @endforeach

            <!-- BUTTON -->
            <div class="mt-4">

                <button type="submit" class="btn btn-submit w-100 text-white">

                    Lihat Hasil Rekomendasi →

                </button>

            </div>

        </form>

    </div>
    <!-- LOADING POPUP -->
    <div id="successPopup" class="popup-overlay">

        <div class="popup-box">

            <div class="spinner-box">
                <div class="spinner-border text-dark" role="status" style="width:70px;height:70px;">
                </div>
            </div>

            <h3>Sedang Memproses</h3>

            <p>
                Jawaban Anda sedang dianalisis oleh sistem.
                Mohon tunggu sebentar...
            </p>

        </div>

    </div>
    <!-- POPUP -->
    <div id="customPopup" class="popup-overlay">

        <div class="popup-box">

            <div class="popup-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>

            <h3>Peringatan</h3>

            <p id="popupMessage"></p>

            <button type="button" onclick="closePopup()" class="popup-btn">

                Oke

            </button>

        </div>

    </div>

    <script>
        let firstUnanswered = null;

        document.addEventListener('DOMContentLoaded', function() {

            const form = document.getElementById('kompetensiForm');

            form.addEventListener('submit', function(e) {

                let unanswered = [];

                @foreach ($kompetensi as $i => $k)

                    let checked{{ $k->id_kompetensi }} =
                        document.querySelector(
                            'input[name="jawaban[{{ $k->id_kompetensi }}]"]:checked'
                        );

                    if (!checked{{ $k->id_kompetensi }}) {

                        unanswered.push({{ $i + 1 }});

                        document.getElementById(
                            'question-{{ $i + 1 }}'
                        ).style.border = '2px solid #ef4444';

                    } else {

                        document.getElementById(
                            'question-{{ $i + 1 }}'
                        ).style.border = '1px solid #e5e7eb';
                    }
                @endforeach

                if (unanswered.length > 0) {

                    e.preventDefault();

                    let message = '';

                    if (unanswered.length == {{ count($kompetensi) }}) {

                        message =
                            'Anda belum mengisi tes kompetensi sama sekali.';

                    } else {

                        message =
                            'Pertanyaan nomor <b>' +
                            unanswered.join(', ') +
                            '</b> belum dijawab.';
                    }

                    firstUnanswered = unanswered[0];

                    document.getElementById('popupMessage').innerHTML = message;
                    document.getElementById('customPopup').style.display = 'flex';

                    return;
                }

                /* ==========================
                   SEMUA SOAL SUDAH TERJAWAB
                   ========================== */

                e.preventDefault();

                /* tampilkan popup loading */
                document.getElementById('successPopup').style.display = 'flex';

                /* submit setelah 2 detik */
                setTimeout(function() {

                    form.submit();

                }, 2000);


            });

        });

        /* ===== CLOSE POPUP ===== */

        function closePopup() {

            document.getElementById(
                'customPopup'
            ).style.display = 'none';

            if (firstUnanswered) {

                const questionElement =
                    document.getElementById(
                        'question-' + firstUnanswered
                    );

                questionElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

            }
        }
    </script>
@endsection
