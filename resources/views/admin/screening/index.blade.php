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

        /* CARD */
        .table-card {
            background: white;
            border-radius: 24px;
            padding: 28px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.03);
        }

        /* TABLE */
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
            vertical-align: top;
            color: #0f172a;
            font-size: 14px;
        }

        .custom-table tbody tr:hover {
            background: #f8fafc;
        }

        /* QUESTION */
        .question-box {
            max-width: 450px;
            line-height: 1.8;
            color: #334155;
        }

        /* BADGE */
        .badge-cluster {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 50px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: 600;
        }

        /* BUTTON */
        .action-btn {
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 10px;
            transition: .2s;
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

        @media(max-width:768px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .table-card {
                overflow-x: auto;
            }

        }
    </style>

    <div class="container-fluid page-wrapper">

        <!-- HEADER -->
        <div class="page-header">

            <div>

                <div class="page-title">
                    Data Screening
                </div>

                <div class="page-subtitle">
                    Kelola pertanyaan screening dan mapping cluster skill
                </div>

            </div>

            <a href="{{ route('screening.create') }}" class="btn btn-add">

                <i class="fas fa-plus mr-2"></i>
                Tambah Pertanyaan

            </a>

        </div>

        <!-- TABLE -->
        <div class="table-card">

            <div class="table-responsive">

                <table class="custom-table">

                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Pertanyaan</th>
                            <th>Cluster Skill</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($screening as $index => $item)
                            <tr>

                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>

                                    <div class="question-box">
                                        {{ $item->pertanyaan }}
                                    </div>

                                </td>

                                <td>

                                    @forelse($item->mapping as $map)
                                        <span class="badge-cluster mb-1">
                                            {{ $map->clusterSkill->nama_cluster ?? '-' }}
                                        </span>

                                        <br>

                                    @empty

                                        <span class="text-muted">
                                            Tidak ada mapping
                                        </span>
                                    @endforelse

                                </td>

                                <td>

                                    <a href="{{ route('screening.edit', $item->id_pertanyaan) }}"
                                        class="action-btn btn-edit d-inline-flex align-items-center justify-content-center">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <button type="button" class="action-btn btn-delete" data-toggle="modal"
                                        data-target="#hapusModal{{ $item->id_pertanyaan }}">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </td>

                            </tr>
                            <!-- MODAL HAPUS -->
                            <div class="modal fade" id="hapusModal{{ $item->id_pertanyaan }}" tabindex="-1"
                                aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered">

                                    <div class="modal-content border-0 shadow" style="border-radius:24px;">

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

                                                Pertanyaan screening ini akan dihapus permanen.

                                            </p>

                                            <!-- BUTTON -->
                                            <div class="d-flex justify-content-center gap-2">

                                                <!-- BATAL -->
                                                <button type="button" class="btn btn-light border px-4"
                                                    data-dismiss="modal">

                                                    Batal

                                                </button>

                                                <!-- HAPUS -->
                                                <form action="{{ route('screening.destroy', $item->id_pertanyaan) }}"
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
                                    Data screening belum tersedia.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
