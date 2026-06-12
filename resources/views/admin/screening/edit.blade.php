@extends('layouts.template')

@section('content')
    <style>
        body {
            background: #f4f7fb;
            font-family: 'Poppins', sans-serif;
        }

        .form-card {
            background: white;
            border-radius: 24px;
            padding: 35px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .03);
        }

        .page-title {
            font-size: 30px;
            font-weight: 700;
            color: #0f172a;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 14px;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 14px;
            border: 1px solid #dbe3ef;
        }

        .cluster-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 18px;
        }

        .cluster-item {
            margin-bottom: 12px;
        }

        .btn-save {
            background: #2563eb;
            border: none;
            border-radius: 14px;
            padding: 12px 24px;
            color: white;
            font-weight: 600;
        }

        .btn-save:hover {
            background: #1d4ed8;
        }

        .btn-back {
            border-radius: 14px;
            padding: 12px 24px;
        }

        /* ===== POPUP ===== */

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.55);
            display: flex;
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

    <div class="container-fluid py-4">

        <!-- HEADER -->
        <div class="mb-4">

            <div class="page-title">
                Edit Screening
            </div>

            <div class="page-subtitle">
                Perbarui pertanyaan screening dan mapping cluster
            </div>

        </div>

        <!-- CARD -->
        <div class="form-card">

            <form id="formScreening" action="{{ route('screening.update', $screening->id_pertanyaan) }}" method="POST"
                novalidate>
                @csrf
                @method('PUT')

                <!-- PERTANYAAN -->
                <div class="mb-4">

                    <label class="form-label">
                        Pertanyaan
                    </label>

                    <textarea name="pertanyaan" rows="4" class="form-control">{{ old('pertanyaan', $screening->pertanyaan) }}</textarea>

                </div>

                <!-- CLUSTER -->
                <div class="mb-4">

                    <label class="form-label">
                        Mapping Cluster Skill
                    </label>

                    <div class="cluster-box">

                        @php
                            $selectedCluster = $screening->mapping->pluck('id_cluster_skill')->toArray();
                        @endphp

                        @foreach ($clusterSkill as $cluster)
                            <div class="form-check cluster-item">

                                <input type="checkbox" name="cluster_skill[]" value="{{ $cluster->id_cluster_skill }}"
                                    class="form-check-input" id="cluster{{ $cluster->id_cluster_skill }}"
                                    {{ in_array($cluster->id_cluster_skill, $selectedCluster) ? 'checked' : '' }}>

                                <label class="form-check-label" for="cluster{{ $cluster->id_cluster_skill }}">

                                    {{ $cluster->nama_cluster }}

                                </label>

                            </div>
                        @endforeach

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('screening.admin.index') }}" class="btn btn-light border btn-back">

                        Batal

                    </a>

                    <button type="submit" class="btn btn-save">

                        <i class="fas fa-save mr-1"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>
    <div class="popup-overlay" id="errorPopup" style="display:none;">

        <div class="popup-box">

            <div class="popup-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>

            <h3>Data Belum Lengkap</h3>

            <p>
                Mohon isi pertanyaan dan pilih minimal satu cluster skill sebelum menyimpan perubahan.
            </p>

            <button type="button" class="popup-btn" onclick="closePopup()">

                Oke

            </button>

        </div>

    </div>
    <script>
        function closePopup() {
            document.getElementById('errorPopup').style.display = 'none';
        }

        document.getElementById('formScreening')
            .addEventListener('submit', function(e) {

                let pertanyaan = document
                    .querySelector('[name="pertanyaan"]')
                    .value
                    .trim();

                let cluster = document
                    .querySelectorAll(
                        'input[name="cluster_skill[]"]:checked'
                    );

                if (
                    pertanyaan === '' ||
                    cluster.length === 0
                ) {

                    e.preventDefault();

                    document.getElementById('errorPopup')
                        .style.display = 'flex';
                }

            });
    </script>
@endsection
