@extends('layouts.template')

@section('content')
    <style>
        body {
            background: #f3f5f9;
            font-family: 'Poppins', sans-serif;
            color: #0f172a;
        }

        /* ===== WRAPPER ===== */
        .screening-wrapper {
            max-width: 920px;
            margin: auto;
            padding-bottom: 30px;
        }

        /* ===== HEADER ===== */
        .screening-header {
            background: linear-gradient(90deg, #020817, #0f172a, #1e293b);
            border-radius: 28px;
            padding: 38px;
            color: white;
            margin-bottom: 28px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.14);
        }

        .screening-header h2 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .screening-header p {
            margin: 0;
            color: rgba(255, 255, 255, 0.82);
            line-height: 1.9;
            font-size: 15px;
            max-width: 760px;
        }

        /* ===== INFO BOX ===== */
        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 18px;

            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-left: 5px solid #0f172a;

            border-radius: 22px;
            padding: 22px 24px;
            margin-bottom: 30px;

            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.04);
        }

        .info-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #eef2ff;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #0f172a;
            font-size: 18px;
            flex-shrink: 0;
        }

        .info-content {
            line-height: 1.9;
            font-size: 14px;
            color: #64748b;
        }

        .info-content b {
            color: #111827;
        }

        /* ===== QUESTION CARD ===== */
        .question-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 24px;
            padding: 26px;
            margin-bottom: 20px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
            transition: .25s;
        }

        .question-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
        }

        /* ===== NUMBER ===== */
        .question-number {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #eef2ff;
            color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
            font-size: 15px;
        }

        /* ===== QUESTION ===== */
        .question-text {
            font-size: 16px;
            font-weight: 600;
            color: #111827;
            line-height: 1.8;
        }

        /* ===== OPTION ===== */
        .option-wrapper {
            display: flex;
            gap: 16px;
            margin-top: 22px;
        }

        .option-item {
            flex: 1;
        }

        .option-item input {
            display: none;
        }

        .option-label {
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 16px;
            text-align: center;
            cursor: pointer;
            transition: .25s;
            font-weight: 600;
            color: #475569;
            background: #ffffff;
        }

        .option-label:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
        }

        .option-item input:checked+.option-label {
            border: 2px solid #0f172a;
            background: #f8fafc;
            color: #0f172a;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
        }

        /* ===== BUTTON ===== */
        .submit-btn {
            border: none;
            border-radius: 18px;
            padding: 17px;
            font-size: 15px;
            font-weight: 700;
            background: #020817;
            color: white;
            transition: .25s;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.16);
        }

        .submit-btn:hover {
            background: #111827;
            transform: translateY(-2px);
            color: white;
        }

        /* ===== TOP PROGRESS ===== */
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

        .progress-page {
            font-size: 13px;
            color: #94a3b8;
            font-weight: 500;
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

        /* ===== MOBILE ===== */
        @media(max-width:768px) {

            .screening-header {
                padding: 28px 24px;
                border-radius: 24px;
            }

            .screening-header h2 {
                font-size: 24px;
            }

            .screening-header p {
                font-size: 14px;
            }

            .info-box {
                flex-direction: column;
                padding: 20px;
            }

            .option-wrapper {
                flex-direction: column;
            }

            .question-card {
                padding: 22px;
            }
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
    </style>

    <!-- TOP BAR -->
    <div class="top-progress-wrapper">

        <div class="progress-info">
            <div class="progress-step">
                LANGKAH 1 DARI 3
            </div>
        </div>

        <div class="progress custom-progress">
            <div class="progress-bar custom-bar" style="width:33%"></div>
        </div>

    </div>
    <div class="container py-4">

        <div class="screening-wrapper">

            <!-- HEADER -->
            <div class="screening-header">

                <h2>
                    Screening Minat dan Kecenderungan Karier TI
                </h2>

                <p>
                    Jawablah setiap pertanyaan sesuai minat dan kecenderungan kemampuan Anda.
                    Hasil screening akan digunakan untuk menentukan cluster skill dan
                    area fungsi yang paling sesuai dengan profil Anda.
                </p>

            </div>

            <!-- INFO -->
            <div class="info-box">

                <div class="info-icon">
                    <i class="fas fa-info"></i>
                </div>

                <div class="info-content">

                    <b>Petunjuk Pengisian</b><br>

                    Pilih <b>Ya</b> apabila Anda merasa tertarik atau memiliki
                    kecenderungan pada aktivitas tersebut.

                    Pilih <b>Tidak</b> apabila aktivitas tersebut tidak sesuai
                    dengan minat atau kecenderungan Anda.

                </div>

            </div>

            <!-- FORM -->
            <form action="{{ route('screening.submit') }}" method="POST" id="screeningForm" novalidate>

                @csrf

                @foreach ($questions as $q)
                    <div class="question-card" id="question-{{ $loop->iteration }}">

                        <div class="d-flex gap-3 align-items-start">

                            <div class="question-number">
                                {{ $loop->iteration }}
                            </div>

                            <div class="question-text">
                                {{ $q->pertanyaan }}
                            </div>

                        </div>

                        <!-- OPTION -->
                        <div class="option-wrapper">

                            <!-- YA -->
                            <label class="option-item">

                                <input type="radio" name="jawaban[{{ $q->id_pertanyaan }}]" value="1">

                                <div class="option-label">
                                    Ya
                                </div>

                            </label>

                            <!-- TIDAK -->
                            <label class="option-item">

                                <input type="radio" name="jawaban[{{ $q->id_pertanyaan }}]" value="0">

                                <div class="option-label">
                                    Tidak
                                </div>

                            </label>

                        </div>

                    </div>
                @endforeach
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
                <!-- BUTTON -->
                <div class="mt-4">

                    <button type="submit" class="submit-btn w-100">

                        Lihat Hasil Screening

                    </button>

                </div>

            </form>

        </div>

    </div>
    <script>
        let firstUnanswered = null;

        document.addEventListener('DOMContentLoaded', function() {

            const form = document.getElementById('screeningForm');

            form.addEventListener('submit', function(e) {

                let unanswered = [];

                @foreach ($questions as $q)

                    let checked{{ $q->id_pertanyaan }} =
                        document.querySelector(
                            'input[name="jawaban[{{ $q->id_pertanyaan }}]"]:checked'
                        );

                    if (!checked{{ $q->id_pertanyaan }}) {

                        unanswered.push({{ $loop->iteration }});

                        document.getElementById(
                            'question-{{ $loop->iteration }}'
                        ).style.border = '2px solid #ef4444';

                    } else {

                        document.getElementById(
                            'question-{{ $loop->iteration }}'
                        ).style.border = '1px solid #e5e7eb';
                    }
                @endforeach

                if (unanswered.length > 0) {

                    e.preventDefault();

                    let message = '';

                    if (unanswered.length == {{ count($questions) }}) {

                        message =
                            'Anda belum mengisi screening sama sekali.';

                    } else {

                        message =
                            'Pertanyaan nomor <b>' +
                            unanswered.join(', ') +
                            '</b> belum dijawab.';
                    }

                    // simpan soal pertama yg belum dijawab
                    firstUnanswered = unanswered[0];

                    // tampilkan pesan popup
                    document.getElementById('popupMessage').innerHTML = message;

                    // tampilkan popup
                    document.getElementById('customPopup').style.display = 'flex';
                }

            });

        });
</script>
 <script>
    function closePopup() {

        // tutup popup
        document.getElementById('customPopup').style.display = 'none';

        // kembali ke soal yang belum dijawab
        if (firstUnanswered) {

            const questionElement = document.getElementById(
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
