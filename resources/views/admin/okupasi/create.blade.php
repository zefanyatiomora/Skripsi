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

        .form-control,
        .form-select {
            border-radius: 14px;
            height: 48px;
            border: 1px solid #dbe3ef;
        }

        textarea.form-control {
            height: auto;
        }

        .kompetensi-box {
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 18px;
            background: #f8fafc;
            max-height: 300px;
            overflow-y: auto;
        }

        .kompetensi-item {
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
        }

        .form-control[readonly] {
            background-color: #f8fafc;
            font-weight: 500;
        }

        }) @keyframes popupShow {

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

    <!-- HEADER -->
    <div class="mb-4">

        <div class="page-title">
            Tambah Okupasi
        </div>

        <div class="page-subtitle">
            Tambahkan data okupasi baru
        </div>

    </div>

    <!-- FORM -->
    <div class="form-card">

        <form id="formOkupasi" action="{{ route('okupasi.store') }}" method="POST" novalidate>
            @csrf

            <div class="row">

                <!-- KODE -->
                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Kode Okupasi
                    </label>

                    <input type="text" name="kode_okupasi" class="form-control">

                </div>

                <!-- NAMA -->
                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Nama Okupasi
                    </label>

                    <input type="text" name="nama_okupasi" class="form-control">

                </div>

                <!-- CLUSTER SKILL -->
                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Cluster Skill
                    </label>

                    <select name="id_cluster_skill" class="form-select">

                        <option value="">
                            -- Pilih Cluster Skill --
                        </option>

                        @foreach ($clusterSkill as $cluster)
                            <option value="{{ $cluster->id_cluster_skill }}">
                                {{ $cluster->nama_cluster }}
                            </option>
                        @endforeach

                    </select>

                </div>

                <!-- AREA FUNGSI -->
                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Area Fungsi
                    </label>

                    <select name="id_area_fungsi" class="form-select">

                        <option value="">
                            -- Pilih Area Fungsi --
                        </option>

                        @foreach ($areaFungsi as $area)
                            <option value="{{ $area->id_area_fungsi }}">
                                {{ $area->kode_area_fungsi }}
                                -
                                {{ $area->nama_area_fungsi }}
                            </option>
                        @endforeach

                    </select>

                </div> <!-- DESKRIPSI -->
                <div class="col-12 mb-4">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi" rows="5" class="form-control"></textarea>

                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <!-- KOMPETENSI -->
                    <div class="col-12 mb-4">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <label class="form-label mb-0">
                                Kompetensi
                            </label>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kompetensiModal">

                                <i class="fas fa-plus me-1"></i>
                                Tambah Kompetensi Baru

                            </button>

                        </div>

                        <div class="mb-3">

                            <input type="text" id="searchKompetensi" class="form-control"
                                placeholder="Cari kode atau nama kompetensi...">

                        </div>

                        <div class="kompetensi-box" id="kompetensiContainer">

                            @foreach ($kompetensi as $item)
                                <div class="form-check kompetensi-item kompetensi-row"
                                    data-search="{{ strtolower($item->kode_kompetensi . ' ' . $item->kompetensi) }}">

                                    <input type="checkbox" name="kompetensi[]" value="{{ $item->id_kompetensi }}"
                                        class="form-check-input" id="k{{ $item->id_kompetensi }}">

                                    <label class="form-check-label" for="k{{ $item->id_kompetensi }}">

                                        <strong>{{ $item->kode_kompetensi }}</strong>
                                        -
                                        {{ $item->kompetensi }}

                                    </label>

                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>

    </div>

    <!-- BUTTON -->
    <div class="d-flex justify-content-end gap-2">

        <a href="{{ route('okupasi.index') }}" class="btn btn-light border btn-back">

            Batal

        </a>

        <button type="submit" class="btn btn-save">

            <i class="fas fa-save mr-1"></i>

            Simpan

        </button>

    </div>

    </form>

    </div>

    </div>

    <script>
        function simpanKompetensi() {
            let kode = document.getElementById('kodeKompetensi').value;
            let nama = document.getElementById('namaKompetensi').value;
            let pernyataan =
                document.getElementById('pertanyaanKompetensi').value;
            fetch("{{ route('kompetensi.ajax.store') }}", {

                    method: "POST",

                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        kode_kompetensi: kode,
                        kompetensi: nama,
                        pertanyaan_kompetensi: pernyataan
                    })

                })

                .then(async response => {

                    let data = await response.json();

                    if (!response.ok) {
                        throw data;
                    }

                    return data;
                })

                .then(result => {

                    let item = result.data;

                    let html = `
<div class="form-check kompetensi-item kompetensi-row"
data-search="${item.kode_kompetensi.toLowerCase()} ${item.kompetensi.toLowerCase()}">

    <input
        type="checkbox"
        checked
        name="kompetensi[]"
        value="${item.id_kompetensi}"
        class="form-check-input"
        id="new${item.id_kompetensi}">

    <label class="form-check-label"
        for="new${item.id_kompetensi}">

        <strong>${item.kode_kompetensi}</strong>
        -
        ${item.kompetensi}

    </label>

</div>
`;

                    document
                        .getElementById('kompetensiContainer')
                        .insertAdjacentHTML('beforeend', html);

                    document.getElementById('kodeKompetensi').value = '';
                    document.getElementById('namaKompetensi').value = '';

                    bootstrap.Modal
                        .getInstance(
                            document.getElementById('kompetensiModal')
                        )
                        .hide();

                })

                .catch(error => {

                    if (error.errors) {

                        let pesan = Object.values(error.errors)
                            .flat()
                            .join('\n');

                        alert(pesan);

                    } else {

                        alert('Terjadi kesalahan saat menyimpan kompetensi.');

                    }

                    console.log(error);

                });
        }
    </script>
    <script>
        document
            .getElementById('searchKompetensi')
            .addEventListener('keyup', function() {

                let keyword =
                    this.value.toLowerCase();

                let rows =
                    document.querySelectorAll('.kompetensi-row');

                rows.forEach(function(row) {

                    let text =
                        row.dataset.search;

                    if (text.includes(keyword)) {

                        row.style.display = '';

                    } else {

                        row.style.display = 'none';

                    }

                });

            });
    </script>
    <script>
        function closePopup() {

            document.getElementById('errorPopup')
                .style.display = 'none';

        }
    </script>
    <script>
        document.getElementById('formOkupasi')
            .addEventListener('submit', function(e) {

                let kode = document.querySelector('[name="kode_okupasi"]').value.trim();

                let nama = document.querySelector('[name="nama_okupasi"]').value.trim();

                let cluster = document.querySelector('[name="id_cluster_skill"]').value;

                let kompetensi =
                    document.querySelectorAll(
                        'input[name="kompetensi[]"]:checked'
                    );

                if (
                    kode === '' ||
                    nama === '' ||
                    cluster === '' ||
                    kompetensi.length === 0
                ) {

                    e.preventDefault();

                    document.getElementById('errorPopup')
                        .style.display = 'flex';
                }

            });
    </script>
    <div class="modal fade" id="kompetensiModal" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        Tambah Kompetensi Baru
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">
                            Kode Kompetensi
                        </label>

                        <input type="text" id="kodeKompetensi" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Nama Kompetensi
                        </label>

                        <input type="text" id="namaKompetensi" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Pernyataan Kompetensi
                        </label>

                        <textarea id="pertanyaanKompetensi" class="form-control" rows="4"></textarea>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="button" class="btn btn-primary" onclick="simpanKompetensi()">
                        Simpan
                    </button>

                </div>

            </div>

        </div>

    </div>
    <div class="popup-overlay" id="errorPopup" style="display:none;">

        <div class="popup-box">

            <div class="popup-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>

            <h3>Data Belum Lengkap</h3>

            <p>
                Mohon lengkapi seluruh data yang diperlukan sebelum menyimpan data okupasi.
            </p>

            <button type="button" class="popup-btn" onclick="closePopup()">

                Oke

            </button>

        </div>

    </div>
@endsection
