@extends('layouts.template')

@section('content')

<div class="container">

    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h5>Edit Profil</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama_pengguna" 
                        class="form-control"
                        value="{{ $user->nama_pengguna }}" required>
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" 
                        class="form-control"
                        value="{{ $user->username }}" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email_pengguna" 
                        class="form-control"
                        value="{{ $user->email_pengguna }}" required>
                </div>

                <div class="mb-3">
                    <label>Password (opsional)</label>
                    <input type="password" name="password" 
                        class="form-control">
                </div>

                <button class="btn btn-success">
                    Simpan Perubahan
                </button>

                <a href="{{ route('profile.index') }}" class="btn btn-secondary">
                    Batal
                </a>

            </form>

        </div>
    </div>

</div>

@endsection