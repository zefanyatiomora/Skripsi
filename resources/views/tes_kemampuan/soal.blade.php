@extends('layouts.template')

@section('content')
    <style>
        body {
            background: #f4f7fb;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 900px;
        }

        /* ===== PROGRESS ===== */
        .top-progress-wrapper {
            margin-bottom: 24px;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .progress-step {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #64748b;
            text-transform: uppercase;
        }

        .custom-progress {
            height: 8px;
            border-radius: 999px;
            background: #e2e8f0;
            overflow: hidden;
        }

        .custom-bar {
            background: linear-gradient(90deg, #020817, #0f172a, #1e293b);
            border-radius: 999px;
        }

        /* ===== TITLE ===== */
        .title-main {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
            margin-top: 15px;
        }

        .subtitle {
            font-size: 14px;
            color: #64748b;
            margin-top: 8px;
        }

        /* ===== QUESTION CARD ===== */
        .question-card {
            background: #fff;
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            border: 1px solid #e5e7eb;
            transition: .25s;
        }

        .question-card:hover {
            transform: translateY(-2px);
        }

        /* ===== NUMBER ===== */
        .number {
            width: 38px;
            height: 38px;
            background: #eef4ff;
            color: #0d6efd;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-right: 14px;
            flex-shrink: 0;
        }

        /* ===== TEXT ===== */
        .question-text {
            font-size: 15px;
            font-weight: 600;
            color: #1e293b;
            display: flex;
            align-items: flex-start;
            line-height: 1.8;
        }

        /* ===== OPTIONS ===== */
        .option-wrapper {
            display: flex;
            gap: 14px;
            margin-top: 22px;
        }

        .option-item {
            flex: 1;
        }

        .option-item input[type="radio"] {
            display: none;
        }

        .option-label {
            border: 2px solid #e9ecef;
            border-radius: 18px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            font-size: 14px;
            transition: 0.25s;
            position: relative;
            background: white;
            font-weight: 500;
        }

        /* HOVER */
        .option-label:hover {
            border-color: #0d6efd;
        }

        /* ACTIVE */
        .option-item input[type="radio"]:checked+.option-label {
            border-color: #0d6efd;
            background: #eef4ff;
            font-weight: 600;
        }

        /* CHECK ICON */
        .option-label::after {
            position: absolute;
            right: 12px;
            top: 10px;
            font-size: 13px;
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
            border-radius: 18px;
            padding: 16px;
            font-size: 15px;
            font-weight: 700;
            background: #020817;
            border: none;
            transition: .25s;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.15);
        }

        .btn-submit:hover {
            background: #111827;
            transform: translateY(-2px);
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
            max-width: 420px;

            border-radius: 28px;

            padding: 32px 28px;

            text-align: center;

            animation: popupShow .25s ease;
        }

        .popup-icon {
            width: 80px;
            height: 80px;

            margin: auto auto 18px;

            border-radius: 50%;

            background: #fee2e2;

            color: #dc2626;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 34px;
        }

        .popup-box h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #0f172a;
        }

        .popup-box p {
            color: #475569;
            line-height: 1.8;
            font-size: 15px;
            margin-bottom: 24px;
        }

        .popup-btn {
            border: none;
            background: #020817;
            color: white;

            padding: 13px 28px;

            border-radius: 14px;

            font-weight: 600;

            transition: .25s;
        }

        .popup-btn:hover {
            background: #111827;
        }

        @keyframes popupShow {

            from {
                transform: scale(.85);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }

        }

        /* ===== MOBILE ===== */
        @media (max-width: 576px) {

            .option-wrapper {
                flex-direction: column;
            }

            .question-card {
                padding: 20px;
            }

            .title-main {
                font-size: 24px;
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

            <input type="hidden" name="id_cluster" value="{{ $cluster->id_cluster_skill }}">

            @foreach ($kompetensi as $i => $k)
                <div class="question-card" id="question-{{ $i + 1 }}">

                    <div class="question-text">

                        <div class="number">
                            {{ $i + 1 }}
                        </div>

                        <div>
                            {{ $k->kompetensi }}
                        </div>

                    </div>

                    <!-- OPTIONS -->
                    <div class="option-wrapper">

                        <!-- YA -->
                        <div class="option-item">

                            <label>

                                <input type="radio" name="jawaban[{{ $k->id_kompetensi }}]" value="1">

                                <div class="option-label">
                                    Ya, Saya Mampu
                                </div>

                            </label>

                        </div>

                        <!-- TIDAK -->
                        <div class="option-item">

                            <label>

                                <input type="radio" name="jawaban[{{ $k->id_kompetensi }}]" value="0">

                                <div class="option-label">
                                    Belum Mampu
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

                    document.getElementById(
                        'popupMessage'
                    ).innerHTML = message;

                    document.getElementById(
                        'customPopup'
                    ).style.display = 'flex';
                }

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
