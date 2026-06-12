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

        /* =========================================
                                       HEADER
                                    ========================================= */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 30px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 14px;
        }

        /* =========================================
                                       BUTTON TAMBAH
                                    ========================================= */
        .btn-add {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 20px;
            font-weight: 600;
            transition: .25s;
        }

        .btn-add:hover {
            background: #1d4ed8;
            color: white;
            transform: translateY(-2px);
        }

        /* =========================================
                                       CARD
                                    ========================================= */
        .table-card {
            background: white;
            border-radius: 24px;
            padding: 28px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.03);
        }

        /* =========================================
                                       TABLE
                                    ========================================= */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table thead th {
            background: #f8fafc;
            padding: 16px;
            font-size: 14px;
            color: #475569;
            font-weight: 600;
            border-bottom: 1px solid #e2e8f0;
        }

        .custom-table tbody td {
            padding: 18px 16px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            color: #0f172a;
            font-size: 14px;
        }

        .custom-table tbody tr:hover {
            background: #f8fafc;
        }

        /* =========================================
                                       BADGE
                                    ========================================= */
        .badge-custom {
            padding: 8px 14px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-cluster {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-area {
            background: #dcfce7;
            color: #15803d;
        }

        /* =========================================
                                       BUTTON AKSI
                                    ========================================= */
        .action-btn {
            width: 38px;
            height: 38px;
            border: none;
            border-radius: 12px;
            transition: .2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-edit {
            background: #eff6ff;
            color: #2563eb;
        }

        .btn-delete {
            background: #fef2f2;
            color: #dc2626;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        /* =========================================
                                       ALERT
                                    ========================================= */
        .alert-modern {
            border-radius: 18px;
            padding: 16px 20px;
            font-size: 14px;
        }

        /* =========================================
                                       MODAL
                                    ========================================= */
        .modal-content {
            border-radius: 24px;
        }

        /* =========================================
                                       RESPONSIVE
                                    ========================================= */
        @media(max-width:768px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .table-card {
                overflow-x: auto;
            }

            .input-group .form-control {
                height: 45px;
                border-radius: 0;
            }

            .input-group-text {
                border-radius: 12px 0 0 12px;
            }

            .input-group .btn {
                border-radius: 0 12px 12px 0;
            }

            .gap-2 {
                gap: 10px;
            }
        }
    </style>

    <div class="container-fluid page-wrapper">

        <!-- ALERT SUCCESS -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 alert-modern mb-4">

                {{ session('success') }}

                <button type="button" class="close" data-dismiss="alert">

                    <span>&times;</span>

                </button>

            </div>
        @endif

        <!-- HEADER -->
        <div class="page-header">

            <div>

                <div class="page-title">
                    Data Okupasi
                </div>

                <div class="page-subtitle">
                    Kelola data okupasi dan rekomendasi karier
                </div>

            </div>

            <a href="{{ route('okupasi.create') }}" class="btn btn-add">

                <i class="fas fa-plus mr-2"></i>

                Tambah Okupasi

            </a>

        </div>

        <div class="table-card">

            <div class="row mb-4">

                <!-- FILTER AREA FUNGSI -->
                <div class="col-md-4 mb-2">

                    <form action="{{ route('okupasi.index') }}" method="GET" class="d-flex gap-2">

                        <select name="area_fungsi" class="form-control">

                            <option value="">
                                Semua Area Fungsi
                            </option>

                            @foreach ($areaFungsi as $area)
                                <option value="{{ $area->id_area_fungsi }}"
                                    {{ request('area_fungsi') == $area->id_area_fungsi ? 'selected' : '' }}>

                                    {{ $area->nama_area_fungsi }}

                                </option>
                            @endforeach

                        </select>

                        {{-- Pertahankan search saat filter --}}
                        <input type="hidden" name="search" value="{{ request('search') }}">

                        <button type="submit" class="btn btn-primary">

                            <i class="fas fa-filter mr-1"></i>

                        </button>

                    </form>

                </div>

                <!-- SEARCH -->
                <div class="col-md-6 mb-2">

                    <form action="{{ route('okupasi.index') }}" method="GET">

                        {{-- Pertahankan area fungsi saat search --}}
                        <input type="hidden" name="area_fungsi" value="{{ request('area_fungsi') }}">

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="fas fa-search text-muted"></i>
                            </span>

                            <input type="text" name="search" class="form-control"
                                placeholder="Cari kode atau nama okupasi lalu tekan Enter..."
                                value="{{ request('search') }}">

                        </div>

                    </form>

                </div>

            </div>

            <div class="table-responsive">

                <table class="custom-table">

                    <thead>

                        <tr>

                            <th width="5%">No</th>

                            <th>Kode</th>

                            <th>Nama Okupasi</th>

                            <th>Cluster Skill</th>

                            <th>Area Fungsi</th>

                            <th width="15%">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($okupasi as $index => $item)
                            <tr>

                                <!-- NO -->
                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <!-- KODE -->
                                <td>

                                    <strong>
                                        {{ $item->kode_okupasi }}
                                    </strong>

                                </td>

                                <!-- NAMA -->
                                <td>
                                    {{ $item->nama_okupasi }}
                                </td>

                                <!-- CLUSTER -->
                                <td>

                                    <span class="badge-custom badge-cluster">

                                        {{ $item->clusterSkill->nama_cluster ?? '-' }}

                                    </span>

                                </td>

                                <!-- AREA -->
                                <td>

                                    <span class="badge-custom badge-area">

                                        {{ $item->areaFungsi->nama_area_fungsi ?? '-' }}

                                    </span>

                                </td>

                                <!-- AKSI -->
                                <td>
                                    <!-- DETAIL -->
                                    <a href="{{ route('okupasi.show', $item->id_okupasi) }}" class="action-btn"
                                        style="background:#ecfeff;color:#0891b2;">

                                        <i class="fas fa-eye"></i>

                                    </a>

                                    <!-- EDIT -->
                                    <a href="{{ route('okupasi.edit', $item->id_okupasi) }}" class="action-btn btn-edit">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <!-- DELETE -->
                                    <button type="button" class="action-btn btn-delete" data-toggle="modal"
                                        data-target="#hapusModal{{ $item->id_okupasi }}">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </td>

                            </tr>

                            <!-- MODAL HAPUS -->
                            <div class="modal fade" id="hapusModal{{ $item->id_okupasi }}" tabindex="-1"
                                aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered">

                                    <div class="modal-content border-0 shadow">

                                        <div class="modal-body text-center p-5">

                                            <!-- ICON -->
                                            <div class="mb-4">

                                                <div
                                                    style="
                                                width:90px;
                                                height:90px;
                                                background:#fef2f2;
                                                color:#dc2626;
                                                border-radius:50%;
                                                display:flex;
                                                align-items:center;
                                                justify-content:center;
                                                margin:auto;
                                                font-size:36px;
                                            ">

                                                    <i class="fas fa-trash"></i>

                                                </div>

                                            </div>

                                            <!-- TITLE -->
                                            <h3 class="fw-bold mb-3">

                                                Hapus Data?

                                            </h3>

                                            <!-- TEXT -->
                                            <p class="text-muted mb-4">

                                                Data okupasi

                                                <strong>
                                                    {{ $item->nama_okupasi }}
                                                </strong>

                                                akan dihapus permanen.

                                            </p>

                                            <!-- BUTTON -->
                                            <div class="d-flex justify-content-center gap-2">

                                                <!-- BATAL -->
                                                <button type="button" class="btn btn-light border px-4"
                                                    data-dismiss="modal">

                                                    Batal

                                                </button>

                                                <!-- HAPUS -->
                                                <form action="{{ route('okupasi.destroy', $item->id_okupasi) }}"
                                                    method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger px-4">

                                                        Ya, Hapus

                                                    </button>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-5 text-muted">

                                    Data okupasi belum tersedia.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
