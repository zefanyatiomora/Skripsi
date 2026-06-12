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

        .badge-area {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-cluster {
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

            .search-box {
                position: relative;
                max-width: 350px;
            }

            .search-box input {
                border-radius: 14px;
                height: 48px;
                padding-left: 45px;
                border: 1px solid #e2e8f0;
            }

            .search-box i {
                position: absolute;
                left: 16px;
                top: 50%;
                transform: translateY(-50%);
                color: #94a3b8;
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

            .btn-info {
                background: #ecfeff;
                color: #0891b2;
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
                    Data Cluster Skill
                </div>

                <div class="page-subtitle">
                    Kelola data cluster skill pada sistem
                </div>

            </div>

            <a href="{{ route('cluster-skill.create') }}" class="btn btn-add">

                <i class="fas fa-plus mr-2"></i>

                Tambah Cluster Skill

            </a>

        </div>
        <div class="table-card">

            <div class="row mb-4">

                <div class="col-md-6">

                    <form action="{{ route('cluster-skill.index') }}" method="GET">

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="fas fa-search text-muted"></i>
                            </span>

                            <input type="text" name="search" class="form-control"
                                placeholder="Cari dan klik enter" value="{{ request('search') }}">

                        </div>

                    </form>

                </div>

            </div>
            <!-- TABLE -->
            <div class="table-card">

                <div class="table-responsive">

                    <table class="custom-table">

                        <thead>

                            <tr>

                                <th width="5%">No</th>

                                <th>Nama Cluster</th>

                                <th width="15%">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($clusterSkill as $index => $item)
                                <tr>

                                    <!-- NO -->
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <!-- CLUSTER -->
                                    <td>

                                        <span class="badge-custom badge-cluster">

                                            {{ $item->nama_cluster }}

                                        </span>

                                    </td>

                                    <!-- AKSI -->
                                    <td>
                                    <a href="{{ route('cluster-skill.show', $item->id_cluster_skill) }}" class="action-btn"
                                        style="background:#ecfeff;color:#0891b2;">

                                        <i class="fas fa-eye"></i>

                                    </a>
                                        <!-- EDIT -->
                                        <a href="{{ route('cluster-skill.edit', $item->id_cluster_skill) }}"
                                            class="action-btn btn-edit">

                                            <i class="fas fa-edit"></i>

                                        </a>

                                        <!-- DELETE -->
                                        <button type="button" class="action-btn btn-delete" data-toggle="modal"
                                            data-target="#hapusModal{{ $item->id_cluster_skill }}">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </td>

                                </tr>

                                <!-- MODAL HAPUS -->
                                <div class="modal fade" id="hapusModal{{ $item->id_cluster_skill }}" tabindex="-1"
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

                                                    Data cluster skill

                                                    <strong>
                                                        {{ $item->nama_cluster }}
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
                                                    <form
                                                        action="{{ route('cluster-skill.destroy', $item->id_cluster_skill) }}"
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

                                    <td colspan="4" class="text-center py-5 text-muted">

                                        Data cluster skill belum tersedia.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    @endsection
