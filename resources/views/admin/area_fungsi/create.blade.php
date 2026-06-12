@extends('layouts.template')

@section('content')
    <style>
        body {
            background: #f4f7fb;
            font-family: 'Poppins', sans-serif;
        }

        .page-wrapper {
            padding: 10px 5px 30px;
        }

        /* HEADER */
        .page-header {
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 30px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 14px;
        }

        /* CARD */
        .form-card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.03);
        }

        /* FORM */
        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-control {
            height: 50px;
            border-radius: 14px;
            border: 1px solid #dbe2ea;
            padding: 10px 16px;
            font-size: 14px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #2563eb;
        }

        textarea.form-control {
            height: 120px;
            resize: none;
        }

        /* BUTTON */
        .btn-save {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 600;
            transition: .25s;
        }

        .btn-save:hover {
            background: #1d4ed8;
            color: white;
        }

        .btn-back {
            background: #f1f5f9;
            color: #334155;
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 600;
            border: none;
        }

        .btn-back:hover {
            background: #e2e8f0;
            color: #0f172a;
        }

        .invalid-feedback {
            display: block;
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

    <div class="container-fluid page-wrapper">

        <!-- HEADER -->
        <div class="page-header">

            <div class="page-title">
                Tambah Area Fungsi
            </div>

            <div class="page-subtitle">
                Tambahkan data area fungsi baru
            </div>

        </div>

        <!-- FORM -->
        <div class="form-card">

            <form id="formAreaFungsi" action="{{ route('area-fungsi.store') }}" method="POST">
                @csrf

                <!-- KODE -->
                <div class="form-group mb-4">

                    <label class="form-label">
                        Kode Area Fungsi
                    </label>

                    <input type="text" name="kode_area_fungsi"
                        class="form-control @error('kode_area_fungsi') is-invalid @enderror"
                        value="{{ old('kode_area_fungsi') }}" placeholder="Contoh: AF001">

                    @error('kode_area_fungsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- NAMA -->
                <div class="form-group mb-4">

                    <label class="form-label">
                        Nama Area Fungsi
                    </label>

                    <input type="text" name="nama_area_fungsi"
                        class="form-control @error('nama_area_fungsi') is-invalid @enderror"
                        value="{{ old('nama_area_fungsi') }}" placeholder="Masukkan nama area fungsi">

                    @error('nama_area_fungsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- BUTTON -->
                <div class="d-flex">

                    <button type="submit" class="btn btn-save mr-2">

                        <i class="fas fa-save mr-2"></i>
                        Simpan

                    </button>

                    <a href="{{ route('area-fungsi.index') }}" class="btn btn-back">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>
    <div class="popup-overlay" id="errorPopup">

        <div class="popup-box">

            <div class="popup-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>

            <h3>Data Belum Lengkap</h3>

            <p>
                Mohon lengkapi seluruh data yang diperlukan sebelum menyimpan Area Fungsi.
            </p>

            <button type="button" class="popup-btn" onclick="closePopup()">

                Oke

            </button>

        </div>

    </div>
    <script>
        function closePopup() {

            document.getElementById('errorPopup')
                .style.display = 'none';

        }

        document
            .getElementById('formAreaFungsi')
            .addEventListener('submit', function(e) {

                let kode =
                    document.querySelector('[name="kode_area_fungsi"]')
                    .value
                    .trim();

                let nama =
                    document.querySelector('[name="nama_area_fungsi"]')
                    .value
                    .trim();

                if (kode === '' || nama === '') {

                    e.preventDefault();

                    document.getElementById('errorPopup')
                        .style.display = 'flex';

                }

            });
    </script>
@endsection
