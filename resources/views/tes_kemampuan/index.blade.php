@extends('layouts.template')

@section('content')
    <style>
        body {
            background: #f4f7fb;
        }

        /* WRAPPER */
        .screening-wrapper {
            max-width: 900px;
            margin: auto;
        }

        /* HEADER */
        .screening-header {
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            border-radius: 24px;
            padding: 35px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.25);
        }

        .screening-header h2 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .screening-header p {
            margin: 0;
            opacity: 0.9;
            line-height: 1.7;
        }

        /* INFO BOX */
        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 15px;

            background: #f8fbff;
            border: 1px solid #dbeafe;
            border-left: 6px solid #2563eb;

            border-radius: 18px;
            padding: 20px 22px;
            margin-bottom: 30px;

            color: #1e3a8a;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.08);
        }

        .info-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #dbeafe;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #2563eb;
            font-size: 18px;
            flex-shrink: 0;
        }

        .info-content {
            line-height: 1.8;
            font-size: 14px;
            color: #334155;
        }

        .info-content b {
            color: #1e3a8a;
        }

        /* QUESTION CARD */
        .question-card {
            background: white;
            border: none;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            transition: 0.25s;
        }

        .question-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        /* NUMBER */
        .question-number {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
        }

        /* QUESTION */
        .question-text {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
            line-height: 1.6;
        }

        /* OPTION */
        .option-wrapper {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .option-item {
            flex: 1;
        }

        .option-item input {
            display: none;
        }

        .option-label {
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            padding: 14px;
            text-align: center;
            cursor: pointer;
            transition: 0.2s;
            font-weight: 500;
            color: #475569;
            background: white;
        }

        .option-label:hover {
            border-color: #2563eb;
            background: #f8fbff;
        }

        .option-item input:checked+.option-label {
            border-color: #2563eb;
            background: #eef4ff;
            color: #2563eb;
            font-weight: 700;
        }

        /* BUTTON */
        .submit-btn {
            border: none;
            border-radius: 16px;
            padding: 16px;
            font-size: 16px;
            font-weight: 700;
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            color: white;
            transition: 0.25s;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.25);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
        }

        /* MOBILE */
        @media(max-width:768px) {

            .screening-header {
                padding: 25px;
            }

            .info-box {
                flex-direction: column;
                padding: 18px;
            }

            .info-icon {
                width: 38px;
                height: 38px;
                font-size: 16px;
            }

            .option-wrapper {
                flex-direction: column;
            }
        }
    </style>

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

                <div class="info-content">

                    <b>Petunjuk Pengisian</b><br>

                    Pilih <b>Ya</b> apabila Anda merasa tertarik atau memiliki
                    kecenderungan pada aktivitas tersebut.

                    Pilih <b>Tidak</b> apabila aktivitas tersebut tidak sesuai
                    dengan minat atau kecenderungan Anda.

                </div>

            </div>

            <!-- FORM -->
            <form action="{{ route('screening.submit') }}" method="POST">

                @csrf

                @foreach ($questions as $q)
                    <div class="question-card">

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

                                <input type="radio" name="jawaban[{{ $q->id_pertanyaan }}]" value="1" required>

                                <div class="option-label">
                                    Ya
                                </div>

                            </label>

                            <!-- TIDAK -->
                            <label class="option-item">

                                <input type="radio" name="jawaban[{{ $q->id_pertanyaan }}]" value="0" required>

                                <div class="option-label">
                                    Tidak
                                </div>

                            </label>

                        </div>

                    </div>
                @endforeach

                <!-- BUTTON -->
                <div class="mt-4">

                    <button type="submit" class="submit-btn w-100">

                        Lihat Hasil Screening

                    </button>

                </div>

            </form>

        </div>

    </div>
@endsection
