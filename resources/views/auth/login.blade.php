<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KompasKu</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f3f5f9;
            border-top: 4px solid #020817;
        }

        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .brand {
            text-align: center;
            margin-bottom: 18px;
        }

        .brand-logo {
            width: 65px;
            height: 65px;
            background: white;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            box-shadow: 0 3px 10px rgba(0, 0, 0, .05);
            margin-bottom: 12px;
        }

        .brand-logo i {
            font-size: 28px;
            color: #0d4fd7;
        }

        .brand-title {
            color: #020817;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .brand-subtitle {
            color: #64748b;
            font-size: 13px;
            margin-top: 3px;
        }

        .hero-mini {
            margin-top: 8px;
            max-width: 420px;
            color: #64748b;
            line-height: 1.5;
            text-align: center;
            font-size: 12px;
        }

        .auth-card {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 18px;
            padding: 26px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 6px 18px rgba(15, 23, 42, .05);
        }

        .card-title {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 5px;
        }

        .card-desc {
            color: #64748b;
            line-height: 1.6;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #1f2937;
            font-size: 13px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i.left {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 13px;
        }

        .input-wrapper i.right {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            font-size: 13px;
        }

        .form-input {
            width: 100%;
            height: 44px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding-left: 42px;
            padding-right: 42px;
            font-size: 13px;
            background: #f8fafc;
            transition: .25s;
        }

        .form-input {
            outline: none;
            border-color: #020817;
            background: white;
            box-shadow: 0 0 0 3px rgba(15, 23, 42, .05);
        }

        .form-input {
            border-color: #cbd5e1;
        }

        .option-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .option-row a {
            text-decoration: none;
            color: #0d4fd7;
            font-weight: 600;
            font-size: 12px;
        }

        .btn-primary {
            width: 100%;
            height: 44px;
            border: none;
            border-radius: 10px;
            background: #020817;
            color: white;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: .25s;
        }

        .btn-primary {
            background: #111827;
            transform: translateY(-1px);
        }

        .switch-form {
            text-align: center;
            margin-top: 15px;
            color: #64748b;
            font-size: 13px;
        }

        .switch-form a {
            color: #0d4fd7;
            text-decoration: none;
            font-weight: 700;
            cursor: pointer;
        }

        .hidden {
            display: none;
        }

        .footer {
            margin-top: 12px;
            color: #94a3b8;
            font-size: 12px;
            text-align: center;
        }

        .modal-box {
            background: white;
            width: 300px;
            max-width: 90%;
            border-radius: 14px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 12px 30px rgba(15, 23, 42, .12);
        }

        .modal-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: #dcfce7;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-icon i {
            font-size: 28px;
            color: #16a34a;
        }

        .modal-box h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .modal-box p {
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .modal-btn {
            width: 100%;
            height: 42px;
            border: none;
            border-radius: 10px;
            background: #020817;
            color: white;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .45);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        @media (max-width:576px) {

            .container {
                padding: 15px;
            }

            .auth-card {
                max-width: 100%;
                padding: 22px;
            }

            .brand-title {
                font-size: 26px;
            }

            .card-title {
                font-size: 20px;
            }

        }
    </style>
</head>

<body>

    <div class="container">

        <!-- BRAND -->
        <div class="brand">

            <div class="brand-title">
                KompasKu
            </div>

            <div class="brand-subtitle">
                Sistem Pendukung Perencanaan Karier Mahasiswa Teknologi Informasi
            </div>
            <div class="hero-mini">
                Temukan jalur karier yang sesuai dengan kompetensi dan potensi terbaik Anda.
            </div>

        </div>

        <div class="auth-card">
            <!-- LOGIN -->
            <div id="loginForm">

                <div class="card-title">
                    Selamat Datang
                </div>

                <div class="card-desc">
                    Masuk untuk melanjutkan perencanaan karier dan melihat
                    rekomendasi okupasi sesuai kompetensi Anda.
                </div>

                <form method="POST" action="{{ url('/login') }}">
                    @csrf

                    <div class="form-group">

                        <label class="form-label">
                            Username
                        </label>

                        <div class="input-wrapper">

                            <i class="fas fa-user left"></i>

                            <input type="text" name="username" class="form-input" placeholder="Masukkan username">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="form-label">
                            Password
                        </label>

                        <div class="input-wrapper">

                            <i class="fas fa-lock left"></i>

                            <input type="password" id="loginPassword" name="password" class="form-input"
                                placeholder="Masukkan password">

                            <i class="fas fa-eye right" onclick="togglePassword('loginPassword', this)">
                            </i>

                        </div>

                    </div>

                    <div class="option-row">

                        <a href="{{ route('forgot.password') }}">
                            Lupa Password?
                        </a>

                    </div>

                    <button class="btn-primary">
                        Masuk
                        <i class="fas fa-arrow-right ms-2"></i>
                    </button>

                </form>

                <div class="switch-form">

                    Belum memiliki akun?

                    <a onclick="showRegister()">
                        Daftar Sekarang
                    </a>

                </div>

            </div>

            <!-- REGISTER -->
            <div id="registerForm" class="hidden">

                <div class="card-title">
                    Buat Akun Baru
                </div>

                <div class="card-desc">
                    Daftarkan akun untuk mulai menggunakan KompasKu.
                </div>

                <form method="POST" action="{{ url('/register') }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>

                        <input type="text" name="nama_pengguna" class="form-input"
                            placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>

                        <input type="email" name="email_pengguna" class="form-input" placeholder="Masukkan email">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Username</label>

                        <input type="text" name="username" class="form-input" placeholder="Masukkan username">
                    </div>

                    <div class="form-group">

                        <label class="form-label">
                            Password
                        </label>

                        <div class="input-wrapper">

                            <input type="password" id="registerPassword" name="password" class="form-input"
                                placeholder="Masukkan password">

                            <i class="fas fa-eye right" onclick="togglePassword('registerPassword', this)">
                            </i>

                        </div>

                    </div>

                    <button class="btn-primary">
                        Daftar Sekarang
                    </button>

                </form>

                <div class="switch-form">

                    Sudah memiliki akun?

                    <a onclick="showLogin()">
                        Login
                    </a>

                </div>

            </div>

        </div>

        <div class="footer">
            © 2026 KompasKu
        </div>

    </div>
    @if (session('success_register'))
        <div id="successModal" class="modal-overlay">
            <div class="modal-box">

                <div class="modal-icon">
                    <i class="fas fa-check-circle"></i>
                </div>

                <h3>Registrasi Berhasil</h3>

                <p>
                    Akun berhasil dibuat.
                    Silakan login menggunakan username dan password yang telah didaftarkan.
                </p>

                <button onclick="closeModal()" class="modal-btn">
                    Login Sekarang
                </button>

            </div>
        </div>
    @endif

    <script>
        function showRegister() {
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('registerForm').classList.remove('hidden');
        }

        function showLogin() {
            document.getElementById('registerForm').classList.add('hidden');
            document.getElementById('loginForm').classList.remove('hidden');
        }

        function togglePassword(id, icon) {

            let input = document.getElementById(id);

            if (input.type === "password") {

                input.type = "text";

                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');

            } else {

                input.type = "password";

                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function closeErrorModal() {
            const modal = document.getElementById('errorModal');

            if (modal) {
                modal.style.display = 'none';
            }
        }

        function closeModal() {

            let modal = document.getElementById('successModal');

            if (modal) {
                modal.style.display = 'none';
            }

            document.getElementById('registerForm').classList.add('hidden');
            document.getElementById('loginForm').classList.remove('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {

            @if (session('success_register'))

                document.getElementById('registerForm').classList.add('hidden');
                document.getElementById('loginForm').classList.remove('hidden');
            @endif

        });
    </script>
    @if (session('success_password'))
        <div id="successModal" class="modal-overlay">

            <div class="modal-box">

                <div class="modal-icon">
                    <i class="fas fa-check-circle"></i>
                </div>

                <h3>Password Berhasil Diubah</h3>

                <p>
                    Password akun Anda berhasil diperbarui.
                    Silakan login menggunakan password baru.
                </p>

                <button onclick="closeModal()" class="modal-btn">
                    Login Sekarang
                </button>

            </div>

        </div>
    @endif
    @if (session('error_username'))
        <div id="errorModal" class="modal-overlay">
            <div class="modal-box">

                <div class="modal-icon" style="background:#fee2e2;">
                    <i class="fas fa-circle-xmark" style="color:#dc2626;"></i>
                </div>

                <h3>Username Tidak Ditemukan</h3>

                <p>
                    Username yang Anda masukkan tidak terdaftar.
                </p>

                <button onclick="closeErrorModal()" class="modal-btn">
                    Tutup
                </button>

            </div>
        </div>
    @endif

    @if (session('error_password'))
        <div id="errorModal" class="modal-overlay">
            <div class="modal-box">

                <div class="modal-icon" style="background:#fee2e2;">
                    <i class="fas fa-circle-xmark" style="color:#dc2626;"></i>
                </div>

                <h3>Password Salah</h3>

                <p>
                    Password yang Anda masukkan tidak sesuai.
                </p>

                <button onclick="closeErrorModal()" class="modal-btn">
                    Tutup
                </button>

            </div>
        </div>
    @endif
</body>

</html>
