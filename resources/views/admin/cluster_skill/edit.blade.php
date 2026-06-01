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
        box-shadow: 0 6px 18px rgba(0,0,0,0.03);
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
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
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

        <form action="{{ route('cluster-skill.update', $clusterSkill->id_cluster_skill) }}"
              method="POST">

            @csrf
            @method('PUT')

            <!-- AREA FUNGSI -->
            <div class="form-group mb-4">

                <label class="form-label">
                    Area Fungsi
                </label>

                <!-- HIDDEN INPUT -->
                <input type="hidden"
                       name="id_area_fungsi"
                       id="id_area_fungsi"
                       value="{{ old('id_area_fungsi', $clusterSkill->id_area_fungsi) }}">

                <!-- CUSTOM DROPDOWN -->
                <div class="dropdown-wrapper">

                    <button type="button"
                            class="dropdown-btn"
                            id="dropdownButton">

                        <span id="dropdownText">

                            @php
                                $selectedArea = $areaFungsi->firstWhere(
                                    'id_area_fungsi',
                                    old('id_area_fungsi', $clusterSkill->id_area_fungsi)
                                );
                            @endphp

                            {{ $selectedArea ? $selectedArea->nama_area_fungsi : '-- Pilih Area Fungsi --' }}

                        </span>

                        <i class="fas fa-chevron-down"></i>

                    </button>

                    <div class="dropdown-menu-custom"
                         id="dropdownMenu">

                        @foreach($areaFungsi as $item)

                            <div class="dropdown-item-custom"
                                 data-id="{{ $item->id_area_fungsi }}"
                                 data-name="{{ $item->nama_area_fungsi }}">

                                {{ $item->nama_area_fungsi }}

                            </div>

                        @endforeach

                    </div>

                </div>

                @error('id_area_fungsi')
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

                <input type="text"
                       name="nama_cluster"
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

                <button type="submit"
                        class="btn btn-update mr-2">

                    <i class="fas fa-save mr-2"></i>
                    Update

                </button>

                <a href="{{ route('cluster-skill.index') }}"
                   class="btn btn-back">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

<script>

    const dropdownButton = document.getElementById('dropdownButton');

    const dropdownMenu = document.getElementById('dropdownMenu');

    const dropdownText = document.getElementById('dropdownText');

    const hiddenInput = document.getElementById('id_area_fungsi');

    // buka tutup dropdown
    dropdownButton.addEventListener('click', function(){

        if(dropdownMenu.style.display === 'block'){

            dropdownMenu.style.display = 'none';

        } else {

            dropdownMenu.style.display = 'block';
        }

    });

    // pilih item
    document.querySelectorAll('.dropdown-item-custom')
        .forEach(item => {

            item.addEventListener('click', function(){

                const id = this.dataset.id;

                const name = this.dataset.name;

                hiddenInput.value = id;

                dropdownText.innerText = name;

                dropdownMenu.style.display = 'none';

            });

        });

    // klik luar dropdown
    document.addEventListener('click', function(e){

        if(!e.target.closest('.dropdown-wrapper')){

            dropdownMenu.style.display = 'none';

        }

    });

</script>

@endsection