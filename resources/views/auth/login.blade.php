<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - SIM SDM</title>

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <style>
        body {
            background: linear-gradient(135deg, #0f1f43, #1e3a8a);
        }

        .login-box {
            width: 400px;
        }

        .login-logo {
            color: white;
        }

        .card {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #f46a10;
            border: none;
        }

        .btn-primary:hover {
            background-color: #d95d0e;
        }
    </style>
</head>

<body class="hold-transition login-page">

<div class="login-box">

    <!-- JUDUL RESMI -->
    <div class="login-logo text-center text-white mb-3">

        <i class="fas fa-graduation-cap fa-2x mb-2"></i>

        <div style="font-size: 16px; font-weight: bold;">
            Sistem Perencanaan Karir Mahasiswa
        </div>

        <div style="font-size: 13px; color:#f46a10;">
            Jurusan Teknologi Informasi
        </div>

        <div style="font-size: 13px;">
            Prodi D4 Sistem Informasi Bisnis
        </div>

    </div>

    <!-- CARD -->
    <div class="card shadow-lg">
        <div class="card-body login-card-body">

            <p class="login-box-msg">Silakan login untuk melanjutkan</p>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <!-- NIM -->
                <div class="input-group mb-3">
                    <input type="text" name="nim_pengguna" class="form-control" placeholder="NIM / NIP" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-id-card"></span>
                        </div>
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>

            </form>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="text-center mt-3 text-white" style="font-size: 12px;">
        © 2026 Sistem Perencanaan Karir Mahasiswa
    </div>

</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>