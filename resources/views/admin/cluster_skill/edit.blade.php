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

        /* DROPDOWN */
        .dropdown-wrapper {
            position: relative;
        }

        .dropdown-btn {
            width: 100%;
            height: 50px;
            border-radius: 14px;
            border: 1px solid #dbe2ea;
            background: white;
            padding: 0 16px;
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            font-size: 14px;
            color: #334155;
        }

        .dropdown-btn:focus {
            outline: none;
            border-color: #2563eb;
        }

        .dropdown-menu-custom {
            position: absolute;
            top: 58px;
            left: 0;
            width: 100%;
            background: white;
            border-radius: 14px;
            border: 1px solid #dbe2ea;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            z-index: 999;
            display: none;
            max-height: 250px;
            overflow-y: auto;
        }

        .dropdown-item-custom {
            padding: 12px 16px;
            cursor: pointer;
            transition: .2s;
            font-size: 14px;
            color: #334155;
        }

        .dropdown-item-custom:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        /* BUTTON */
        .btn-update {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 600;
            transition: .25s;
        }

        .btn-update:hover {
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
                Edit Cluster Skill
            </div>

            <div class="page-subtitle">
                Perbarui data cluster skill
            </div>

        </div>

        <!-- FORM -->
        <div class="form-card">

            <form id="formClusterSkill" action="{{ route('cluster-skill.update', $clusterSkill->id_cluster_skill) }}"
                method="POST">
                @csrf
                @method('PUT')
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
                                {{ old('id_domain', $clusterSkill->id_domain) == $item->id_domain ? 'selected' : '' }}>

                                {{ $item->nama_domain }}

                            </option>
                        @endforeach

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
                        class="form-control @error('nama_cluster') is-invalid @enderror"
                        value="{{ old('nama_cluster', $clusterSkill->nama_cluster) }}">

                    @error('nama_cluster')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- BUTTON -->
                <div class="d-flex">

                    <button type="submit" class="btn btn-update mr-2">

                        <i class="fas fa-save mr-2"></i>
                        Update

                    </button>

                    <a href="{{ route('cluster-skill.index') }}" class="btn btn-back">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>
    <script>
        function closePopup() {
            document.getElementById('errorPopup').style.display = 'none';
        }

        document
            .getElementById('formClusterSkill')
            .addEventListener('submit', function(e) {

                let domain =
                    document.getElementById('id_domain')
                    .value;

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
                Mohon lengkapi Domain dan Nama Cluster Skill terlebih dahulu.
            </p>

            <button type="button" class="popup-btn" onclick="closePopup()">

                Oke

            </button>

        </div>

    </div>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#id_domain').select2({
                placeholder: '-- Pilih Domain --',
                allowClear: true,
                width: '100%'
            });

        });
    </script>
@endsection
