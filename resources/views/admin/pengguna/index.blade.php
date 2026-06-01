@extends('layouts.template')

@section('content')

<style>
    body{
        background:#f4f7fb;
        font-family:'Poppins', sans-serif;
    }

    .page-wrapper{
        padding:10px 5px 30px;
    }

    /* HEADER */
    .page-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
    }

    .page-title{
        font-size:30px;
        font-weight:700;
        color:#0f172a;
        margin-bottom:4px;
    }

    .page-subtitle{
        color:#64748b;
        font-size:14px;
    }

    .btn-add{
        background:#2563eb;
        color:white;
        border:none;
        border-radius:14px;
        padding:12px 20px;
        font-weight:600;
        transition:.25s;
    }

    .btn-add:hover{
        background:#1d4ed8;
        color:white;
        transform:translateY(-2px);
    }

    /* CARD */
    .table-card{
        background:white;
        border-radius:24px;
        padding:28px;
        border:1px solid #e5e7eb;
        box-shadow:0 6px 18px rgba(0,0,0,0.03);
    }

    /* TABLE */
    .custom-table{
        width:100%;
        border-collapse:collapse;
    }

    .custom-table thead th{
        background:#f8fafc;
        padding:16px;
        font-size:14px;
        color:#475569;
        font-weight:600;
        border-bottom:1px solid #e2e8f0;
    }

    .custom-table tbody td{
        padding:18px 16px;
        border-bottom:1px solid #f1f5f9;
        vertical-align:middle;
        color:#0f172a;
        font-size:14px;
    }

    .custom-table tbody tr:hover{
        background:#f8fafc;
    }

    /* BADGE */
    .badge-role{
        padding:8px 14px;
        border-radius:50px;
        font-size:12px;
        font-weight:600;
    }

    .badge-admin{
        background:#dbeafe;
        color:#1d4ed8;
    }

    .badge-mahasiswa{
        background:#dcfce7;
        color:#15803d;
    }

    /* BUTTON */
    .action-btn{
        width:36px;
        height:36px;
        border:none;
        border-radius:10px;
        transition:.2s;
    }

    .btn-edit{
        background:#eff6ff;
        color:#2563eb;
    }

    .btn-delete{
        background:#fef2f2;
        color:#dc2626;
    }

    .action-btn:hover{
        transform:translateY(-2px);
    }

    @media(max-width:768px){

        .page-header{
            flex-direction:column;
            align-items:flex-start;
            gap:15px;
        }

        .table-card{
            overflow-x:auto;
        }

    }
</style>

<div class="container-fluid page-wrapper">

    <!-- HEADER -->
    <div class="page-header">

        <div>
            <div class="page-title">
                Data Pengguna
            </div>

            <div class="page-subtitle">
                Kelola seluruh data pengguna sistem
            </div>
        </div>

    </div>

    <!-- TABLE -->
    <div class="table-card">

        <div class="table-responsive">

            <table class="custom-table">

                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Jenis Pengguna</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($pengguna as $index => $item)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>

                            <td>
                                {{ $item->nama_pengguna }}
                            </td>

                            <td>
                                {{ $item->username }}
                            </td>

                            <td>
                                {{ $item->email_pengguna }}
                            </td>

                            <td>

                                @if($item->role == 'admin')

                                    <span class="badge-role badge-admin">
                                        Admin
                                    </span>

                                @else

                                    <span class="badge-role badge-mahasiswa">
                                        Mahasiswa
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $item->jenisPengguna->nama_jenis_pengguna ?? '-' }}
                            </td>

                            <td>

                                <button class="action-btn btn-edit">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button class="action-btn btn-delete">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                Data pengguna belum tersedia.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection