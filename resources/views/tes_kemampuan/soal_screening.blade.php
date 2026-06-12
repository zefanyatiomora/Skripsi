@extends('layouts.template')

@section('content')
    <style>
        body {
            background: #f3f5f9;
            font-family: 'Poppins', sans-serif;
        }

        .container-box {
            max-width: 900px;
            margin: auto;
        }

        .card-box {
            background: white;
            padding: 24px;
            border-radius: 20px;
            border: 1px solid #e5e7eb;
            margin-bottom: 16px;
        }

        .title {
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 16px;
        }

        .question-box {
            padding: 18px;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            margin-bottom: 14px;
            background: #fff;
        }

        .question-text {
            font-weight: 600;
            margin-bottom: 12px;
            color: #0f172a;
        }

        .option-group {
            display: flex;
            gap: 12px;
        }

        .option {
            flex: 1;
        }

        .option input {
            display: none;
        }

        .option label {
            display: block;
            text-align: center;
            padding: 10px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            cursor: pointer;
            font-weight: 600;
            transition: .2s;
        }

        .option input:checked+label {
            background: #0f172a;
            color: white;
            border-color: #0f172a;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            border: none;
            background: #0f172a;
            color: white;
            font-weight: 700;
            border-radius: 14px;
        }

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
            padding: 28px;
            border-radius: 20px;
            width: 90%;
            max-width: 420px;
            text-align: center;
            animation: popupShow .2s ease;
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
    </style>

    <div class="container py-4 container-box">

        <div class="card-box">
            <div class="title">Screening Pertanyaan</div>
            <p>Jawablah semua pertanyaan sesuai kondisi kamu.</p>
        </div>

        <form action="{{ route('screening.submit') }}" method="POST" id="formScreening">
            @csrf

            @foreach ($pertanyaan as $i => $q)
                <div class="question-box">
                    <div class="question-text">
                        {{ $i + 1 }}. {{ $q->pertanyaan_kompetensi ?? $q->pertanyaan }}
                    </div>

                    <div class="option-group">

                        <div class="option">
                            <input type="radio" id="yes{{ $q->id_pertanyaan }}" name="jawaban[{{ $q->id_pertanyaan }}]"
                                value="1">

                            <label for="yes{{ $q->id_pertanyaan }}">
                                Ya
                            </label>
                        </div>

                        <div class="option">
                            <input type="radio" id="no{{ $q->id_pertanyaan }}" name="jawaban[{{ $q->id_pertanyaan }}]"
                                value="0">

                            <label for="no{{ $q->id_pertanyaan }}">
                                Tidak
                            </label>
                        </div>

                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn-submit mt-3">
                Lihat Hasil Screening
            </button>

        </form>
        <div id="customPopup" class="popup-overlay" style="display:none;">
            <div class="popup-box">
                <h3>Peringatan</h3>
                <p id="popupMessage"></p>
                <button type="button" onclick="closePopup()" class="btn-submit">OK</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.getElementById('formScreening');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                let questions = document.querySelectorAll('.question-box');
                let belumDiisi = [];

                questions.forEach((box, index) => {

                    let input = box.querySelector('input[type="radio"]:checked');

                    if (!input) {
                        belumDiisi.push(index + 1);
                    }
                });

                let total = questions.length;

                if (belumDiisi.length === total) {
                    showPopup("Anda belum menjawab semua pertanyaan.");
                    return;
                }

                if (belumDiisi.length > 0) {
                    showPopup("Pertanyaan nomor <b>" + belumDiisi.join(', ') + "</b> belum diisi.");
                    return;
                }

                form.submit();
            });

        });

        function showPopup(message) {
            document.getElementById('popupMessage').innerHTML = message;
            document.getElementById('customPopup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('customPopup').style.display = 'none';
        }
    </script>
@endsection
