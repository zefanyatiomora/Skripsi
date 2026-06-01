@extends('layouts.template')

@section('content')

<style>
    body{
        background:#f4f7fb;
        font-family:'Poppins', sans-serif;
    }

    .form-card{
        background:white;
        border-radius:24px;
        padding:35px;
        border:1px solid #e5e7eb;
        box-shadow:0 6px 18px rgba(0,0,0,.03);
    }

    .page-title{
        font-size:30px;
        font-weight:700;
        color:#0f172a;
    }

    .page-subtitle{
        color:#64748b;
        font-size:14px;
    }

    .form-label{
        font-weight:600;
        color:#334155;
        margin-bottom:8px;
    }

    .form-control{
        border-radius:14px;
        border:1px solid #dbe3ef;
    }

    .cluster-box{
        background:#f8fafc;
        border:1px solid #e2e8f0;
        border-radius:18px;
        padding:18px;
    }

    .cluster-item{
        margin-bottom:12px;
    }

    .btn-save{
        background:#2563eb;
        border:none;
        border-radius:14px;
        padding:12px 24px;
        color:white;
        font-weight:600;
    }

    .btn-save:hover{
        background:#1d4ed8;
    }

    .btn-back{
        border-radius:14px;
        padding:12px 24px;
    }
</style>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="mb-4">

        <div class="page-title">
            Tambah Screening
        </div>

        <div class="page-subtitle">
            Tambahkan pertanyaan screening baru
        </div>

    </div>

    <!-- CARD -->
    <div class="form-card">

        <form action="{{ route('screening.store') }}"
              method="POST">

            @csrf

            <!-- PERTANYAAN -->
            <div class="mb-4">

                <label class="form-label">
                    Pertanyaan
                </label>

                <textarea name="pertanyaan"
                          rows="4"
                          class="form-control"
                          required>{{ old('pertanyaan') }}</textarea>

            </div>

            <!-- CLUSTER -->
            <div class="mb-4">

                <label class="form-label">
                    Mapping Cluster Skill
                </label>

                <div class="cluster-box">

                    @foreach($clusterSkill as $cluster)

                        <div class="form-check cluster-item">

                            <input type="checkbox"
                                   name="cluster_skill[]"
                                   value="{{ $cluster->id_cluster_skill }}"
                                   class="form-check-input"
                                   id="cluster{{ $cluster->id_cluster_skill }}">

                            <label class="form-check-label"
                                   for="cluster{{ $cluster->id_cluster_skill }}">

                                {{ $cluster->nama_cluster }}

                            </label>

                        </div>

                    @endforeach

                </div>

            </div>

            <!-- BUTTON -->
            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('screening.admin.index') }}"
                   class="btn btn-light border btn-back">

                    Batal

                </a>

                <button type="submit"
                        class="btn btn-save">

                    <i class="fas fa-save mr-1"></i>

                    Simpan Data

                </button>

            </div>

        </form>

    </div>

</div>

@endsection