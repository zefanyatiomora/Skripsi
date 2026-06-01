@extends('layouts.template')

@section('content')
    <style>
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
    <div class="container-fluid py-4">
        @if ($errors->has('nama_okupasi'))
            <div class="popup-overlay" id="errorPopup">

                <div class="popup-box">

                    <div class="popup-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>

                    <h3>Format Tidak Valid</h3>

                    <p>
                        {{ $errors->first('nama_okupasi') }}
                    </p>

                    <button type="button" class="popup-btn" onclick="closePopup()">

                        Oke

                    </button>

                </div>

            </div>
        @endif

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="fw-bold mb-1">Edit Okupasi</h3>
                <p class="text-muted mb-0">
                    Ubah data okupasi dan kompetensi
                </p>
            </div>

            <a href="{{ route('okupasi.index') }}" class="btn btn-light border">
                <i class="fas fa-arrow-left me-1"></i>
                Kembali
            </a>

        </div>

        {{-- CARD --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <form action="{{ route('okupasi.update', $okupasi->id_okupasi) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        {{-- KODE OKUPASI --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Kode Okupasi
                            </label>

                            <input type="text" name="kode_okupasi"
                                class="form-control @error('kode_okupasi') is-invalid @enderror"
                                value="{{ old('kode_okupasi', $okupasi->kode_okupasi) }}">

                            @error('kode_okupasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- NAMA OKUPASI --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Nama Okupasi
                            </label>

                            <input type="text" name="nama_okupasi"
                                class="form-control @error('nama_okupasi') is-invalid @enderror"
                                value="{{ old('nama_okupasi', $okupasi->nama_okupasi) }}">

                            @error('nama_okupasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- CLUSTER SKILL --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Cluster Skill
                            </label>

                            <select name="id_cluster_skill" id="clusterSkill"
                                class="form-select @error('id_cluster_skill') is-invalid @enderror">
                                <option value="">
                                    -- Pilih Cluster Skill --
                                </option>

                                @foreach ($clusterSkill as $cluster)
                                    <option value="{{ $cluster->id_cluster_skill }}"
                                        data-area="{{ $cluster->areaFungsi->nama_area_fungsi }}"
                                        {{ old('id_cluster_skill', $okupasi->id_cluster_skill) == $cluster->id_cluster_skill ? 'selected' : '' }}>
                                        {{ $cluster->nama_cluster }}
                                    </option>
                                @endforeach

                            </select>

                            @error('id_cluster_skill')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- AREA FUNGSI --}}
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Area Fungsi
                            </label>

                            <input type="text" id="areaFungsi" class="form-control"
                                value="{{ $okupasi->areaFungsi->nama_area_fungsi ?? '' }}" readonly>
                        </div>

                        {{-- KOMPETENSI --}}
                        <div class="col-12">

                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <label class="form-label fw-semibold mb-0">
                                    Kompetensi Terkait
                                </label>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kompetensiModal">

                                    <i class="fas fa-plus me-1"></i>
                                    Tambah Kompetensi Baru

                                </button>

                            </div>

                            {{-- SEARCH --}}
                            <div class="mb-3">

                                <input type="text" id="searchKompetensi" class="form-control"
                                    placeholder="Cari kode atau nama kompetensi...">

                            </div>

                            <div id="kompetensiContainer" class="border rounded-4 p-3 bg-light"
                                style="max-height:350px; overflow-y:auto;">
                                @foreach ($kompetensi as $item)
                                    <div class="form-check mb-2 kompetensi-row"
                                        data-search="{{ strtolower($item->kode_kompetensi . ' ' . $item->kompetensi) }}">

                                        <input class="form-check-input" type="checkbox" name="kompetensi[]"
                                            value="{{ $item->id_kompetensi }}" id="k{{ $item->id_kompetensi }}"
                                            {{ in_array($item->id_kompetensi, $okupasi->kompetensi->pluck('id_kompetensi')->toArray()) ? 'checked' : '' }}>

                                        <label class="form-check-label" for="k{{ $item->id_kompetensi }}">

                                            <strong>
                                                {{ $item->kode_kompetensi }}
                                            </strong>

                                            -

                                            {{ $item->kompetensi }}

                                        </label>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                Deskripsi
                            </label>

                            <textarea name="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $okupasi->deskripsi) }}</textarea>

                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-end gap-2 mt-4">

                        <a href="{{ route('okupasi.index') }}" class="btn btn-light border">

                            Batal

                        </a>

                        <button type="submit" class="btn btn-primary">

                            <i class="fas fa-save me-1"></i>
                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
    <script>
        function closePopup() {
            document.getElementById('errorPopup').style.display = 'none';
        }
    </script>
    <script>
        document
            .getElementById('clusterSkill')
            .addEventListener('change', function() {

                let selected =
                    this.options[this.selectedIndex];

                document.getElementById('areaFungsi').value =
                    selected.dataset.area || '';

            });
    </script>
    <script>
        document
            .getElementById('searchKompetensi')
            .addEventListener('keyup', function() {

                let keyword = this.value.toLowerCase();

                let rows =
                    document.querySelectorAll('.kompetensi-row');

                rows.forEach(function(row) {

                    let text = row.dataset.search;

                    if (text.includes(keyword)) {

                        row.style.display = '';

                    } else {

                        row.style.display = 'none';

                    }

                });

            });
    </script>
    <div class="modal fade" id="kompetensiModal" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Tambah Kompetensi
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
    <script>
        function simpanKompetensi() {

            let kode =
                document.getElementById('kodeKompetensi').value;

            let nama =
                document.getElementById('namaKompetensi').value;

            fetch("{{ route('kompetensi.ajax.store') }}", {

                    method: "POST",

                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },

                    body: JSON.stringify({

                        kode_kompetensi: kode,
                        kompetensi: nama

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

<div class="form-check mb-2 kompetensi-row"
     data-search="${item.kode_kompetensi.toLowerCase()} ${item.kompetensi.toLowerCase()}">

    <input
        class="form-check-input"
        type="checkbox"
        checked
        name="kompetensi[]"
        value="${item.id_kompetensi}"
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

                        alert(
                            'Terjadi kesalahan saat menyimpan kompetensi.'
                        );

                    }

                });

        }
    </script>
@endsection
