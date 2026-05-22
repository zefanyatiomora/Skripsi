@extends('layouts.template')

@section('content')

<style>
body {
    background: #f4f7fb;
}

/* CARD */
.profile-card {
    border-radius: 18px;
    background: #ffffff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    padding: 25px;
}

/* HEADER */
.profile-header {
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 20px;
    padding-bottom: 10px;
}

.profile-title {
    font-size: 20px;
    font-weight: 600;
    color: #1e293b;
}

/* INPUT */
.form-label {
    font-size: 13px;
    color: #64748b;
}

.form-control {
    border-radius: 10px;
    font-size: 14px;
}

/* BUTTON */
.btn-save {
    border-radius: 30px;
    padding: 10px 20px;
    font-weight: 500;
}

/* ALERT */
.alert-modern {
    border-radius: 10px;
    font-size: 13px;
}
</style>

<div class="container mt-4">

    <div class="profile-card">

        <!-- HEADER -->
        <div class="profile-header">
            <div class="profile-title">
                Edit Profil
            </div>
        </div>

        <!-- ALERT -->
        @if(session('success'))
            <div class="alert alert-success alert-modern">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf

            <div class="row">

                <!-- NAMA -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text"
                           name="nama_pengguna"
                           value="{{ old('nama_pengguna', $user->nama_pengguna) }}"
                           class="form-control" required>

                    @error('nama_pengguna')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- USERNAME -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Username</label>
                    <input type="text"
                           name="username"
                           value="{{ old('username', $user->username) }}"
                           class="form-control" required>

                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- EMAIL -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email_pengguna"
                           value="{{ old('email_pengguna', $user->email_pengguna) }}"
                           class="form-control" required>

                    @error('email_pengguna')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Password Baru <small class="text-muted">(opsional)</small>
                    </label>
                    <input type="password"
                           name="password"
                           class="form-control">

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-save">
                    Simpan Perubahan →
                </button>
            </div>

        </form>

    </div>

</div>

@endsection