@extends('layouts.template')

@section('content')
    <!-- SELECT2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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

        .form-control,
        .custom-select {
            height: 50px;
            border-radius: 14px;
            border: 1px solid #dbe2ea;
            padding: 10px 16px;
            font-size: 14px;
        }

        .form-control:focus,
        .custom-select:focus {
            box-shadow: none;
            border-color: #2563eb;
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

        /* SELECT2 */
        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single {
            height: 50px !important;
            border-radius: 14px !important;
            border: 1px solid #dbe2ea !important;
            padding: 10px 12px !important;
            display: flex !important;
            align-items: center !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: normal !important;
            color: #334155;
            padding-left: 0 !important;
            font-size: 14px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 48px !important;
            right: 10px;
        }

        .select2-dropdown {
            border-radius: 14px !important;
            border: 1px solid #dbe2ea !important;
            overflow: hidden;
        }

        .select2-search__field {
            border-radius: 10px !important;
            padding: 8px !important;
        }

        .select2-results__option {
            padding: 10px 14px;
            font-size: 14px;
        }

        .select2-results__option--highlighted {
            background: #2563eb !important;
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

        .form-control,
        .custom-select {
            height: 50px;
            border-radius: 14px;
            border: 1px solid #dbe2ea;
            padding: 10px 16px;
            font-size: 14px;
        }

        .form-control:focus,
        .custom-select:focus {
            box-shadow: none;
            border-color: #2563eb;
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

        /* SELECT2 */
        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single {
            height: 50px !important;
            border-radius: 14px !important;
            border: 1px solid #dbe2ea !important;
            padding: 10px 12px !important;
            display: flex !important;
            align-items: center !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: normal !important;
            color: #334155;
            padding-left: 0 !important;
            font-size: 14px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 48px !important;
            right: 10px;
        }

        .select2-dropdown {
            border-radius: 14px !important;
            border: 1px solid #dbe2ea !important;
            overflow: hidden;
        }

        .select2-search__field {
            border-radius: 10px !important;
            padding: 8px !important;
        }

        .select2-results__option {
            padding: 10px 14px;
            font-size: 14px;
        }

        .select2-results__option--highlighted {
            background: #2563eb !important;
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
            background: #fff;
            width: 90%;
            max-width: 420px;

            border-radius: 24px;
            padding: 30px;

            text-align: center;

            box-shadow: 0 10px 25px rgba(0, 0, 0, .15);
        }

        .popup-icon {
            width: 80px;
            height: 80px;

            margin: 0 auto 20px;

            border-radius: 50%;

            background: #fee2e2;
            color: #dc2626;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 34px;
        }

        .popup-btn {
            border: none;
            background: #020817;
            color: #fff;

            padding: 12px 28px;

            border-radius: 14px;
            font-weight: 600;
        }
    </style>

    <div class="container-fluid page-wrapper">

        <!-- HEADER -->
        <div class="page-header">

            <div class="page-title">
                Tambah Cluster Skill
            </div>

            <div class="page-subtitle">
                Tambahkan data cluster skill baru
            </div>

        </div>

        <!-- FORM -->
        <div class="form-card">

            <form id="formClusterSkill" action="{{ route('cluster-skill.store') }}" method="POST">

                @csrf

                <!-- DOMAIN -->
                <div class="form-group mb-4">

                    <label class="form-label">
                        Domain
                    </label>

                    <select name="id_domain" id="id_domain" class="form-control @error('id_domain') is-invalid @enderror">

                        <option value="">
                            -- Pilih Domain --
                        </option>

                        @foreach ($domain as $item)
                            <option value="{{ $item->id_domain }}"
                                {{ old('id_domain') == $item->id_domain ? 'selected' : '' }}>

                                {{ $item->nama_domain }}

                            </option>
                        @endforeach

                    </select>

                    </select>

                    @error('id_domain')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- NAMA CLUSTER -->
                <div class="form-group mb-4">

                    <label class="form-label">
                        Nama Cluster Skill
                    </label>

                    <input type="text" name="nama_cluster"
                        class="form-control @error('nama_cluster') is-invalid @enderror" value="{{ old('nama_cluster') }}"
                        placeholder="Masukkan nama cluster skill">

                    @error('nama_cluster')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- BUTTON -->
                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-save">

                        <i class="fas fa-save mr-2"></i>
                        Simpan

                    </button>

                    <a href="{{ route('cluster-skill.index') }}" class="btn btn-back">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SELECT2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#id_domain').select2({
                placeholder: "-- Pilih Domain --",
                allowClear: true,
                width: '100%'
            });

        });
    </script>
    <script>
        function closePopup() {
            document.getElementById('errorPopup').style.display = 'none';
        }

        document
            .getElementById('formClusterSkill')
            .addEventListener('submit', function(e) {

                let domain =
                    document.getElementById('id_domain').value;

                let nama =
                    document.querySelector('[name="nama_cluster"]')
                    .value
                    .trim();

                if (domain === '' || nama === '') {

                    e.preventDefault();

                    document.getElementById('errorPopup')
                        .style.display = 'flex';
                }

            });
    </script>
    <!-- POPUP ERROR -->
    <div class="popup-overlay" id="errorPopup">

        <div class="popup-box">

            <div class="popup-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>

            <h3>Data Belum Lengkap</h3>

            <p>
                Mohon lengkapi Area Fungsi dan Nama Cluster Skill terlebih dahulu.
            </p>

            <button type="button" class="popup-btn" onclick="closePopup()">

                Oke

            </button>

        </div>

    </div>
@endsection
