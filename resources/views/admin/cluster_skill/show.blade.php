@extends('layouts.template')

@section('content')

<style>
    body{
        background:#f4f7fb;
        font-family:'Poppins',sans-serif;
    }

    .page-wrapper{
        padding:10px 5px 30px;
    }

    .page-title{
        font-size:30px;
        font-weight:700;
        color:#0f172a;
        margin-bottom:5px;
    }

    .page-subtitle{
        color:#64748b;
        font-size:14px;
        margin-bottom:25px;
    }

    .detail-card{
        background:white;
        border-radius:24px;
        padding:32px;
        border:1px solid #e5e7eb;
        box-shadow:0 6px 18px rgba(0,0,0,.03);
    }

    .detail-item{
        margin-bottom:25px;
    }

    .detail-label{
        font-size:13px;
        color:#64748b;
        font-weight:600;
        margin-bottom:6px;
    }

    .detail-value{
        font-size:16px;
        font-weight:600;
        color:#0f172a;
    }

    .badge-area{
        background:#dbeafe;
        color:#1d4ed8;
        padding:8px 14px;
        border-radius:50px;
        display:inline-block;
        font-size:13px;
    }

    .btn-back{
        background:#f1f5f9;
        color:#334155;
        border:none;
        border-radius:14px;
        padding:12px 24px;
        font-weight:600;
    }
</style>

<div class="container-fluid page-wrapper">

```
<div class="page-title">
    Detail Cluster Skill
</div>

<div class="page-subtitle">
    Informasi lengkap cluster skill
</div>

<div class="detail-card">

    <div class="detail-item">

        <div class="detail-label">
            ID Cluster Skill
        </div>

        <div class="detail-value">
            {{ $clusterSkill->id_cluster_skill }}
        </div>

    </div>

    <div class="detail-item">

        <div class="detail-label">
            Area Fungsi
        </div>

        <span class="badge-area">

            {{ $clusterSkill->areaFungsi->nama_area_fungsi ?? '-' }}

        </span>

    </div>

    <div class="detail-item">

        <div class="detail-label">
            Nama Cluster Skill
        </div>

        <div class="detail-value">

            {{ $clusterSkill->nama_cluster }}

        </div>

    </div>

    <hr>

    <a href="{{ route('cluster-skill.index') }}"
        class="btn btn-back">

        <i class="fas fa-arrow-left me-2"></i>
        Kembali

    </a>

</div>
```

</div>

@endsection
