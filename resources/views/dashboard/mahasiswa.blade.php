@extends('layouts.template')

@section('content')

<div class="container-fluid">

    <!-- Welcome -->
    <div class="card shadow-sm mb-4" style="border-left: 5px solid #f46a10;">
        <div class="card-body">
            <h4 style="color:#0f1f43;">
                Selamat Datang, {{ $user->nama_pengguna }} 👋
            </h4>
            <p class="mb-0">
                Selamat datang di sistem informasi mahasiswa.
            </p>
        </div>
    </div>

    <!-- Identitas -->
    <div class="card shadow-sm">
        <div class="card-header text-white" style="background-color:#0f1f43;">
            <h5 class="mb-0">Identitas Mahasiswa</h5>
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label><strong>Nama</strong></label>
                    <div class="form-control bg-light">
                        {{ $user->nama_pengguna }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label><strong>NIM</strong></label>
                    <div class="form-control bg-light">
                        {{ $user->nim_pengguna }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label><strong>Email</strong></label>
                    <div class="form-control bg-light">
                        {{ $user->email_pengguna }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label><strong>Role</strong></label>
                    <div class="form-control bg-light">
                        {{ ucfirst($user->role) }}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection