<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sistem Perencanaan Karier</title>

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
        }

        /* LAYOUT */
        .container-auth {
            display: flex;
            min-height: 100vh;
        }

        /* LEFT */
        .left {
            flex: 1;
            background: linear-gradient(135deg, #0f172a, #2563eb);
            color: white;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            font-size: 14px;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .left h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .left p {
            font-size: 14px;
            line-height: 1.8;
            max-width: 520px;
            opacity: 0.92;
        }

        /* FEATURES */
        .features {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .feature {
            background: rgba(255, 255, 255, 0.10);
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            padding: 18px;
            border-radius: 16px;
            transition: 0.3s;
        }

        .feature:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.14);
        }

        .feature i {
            font-size: 18px;
            margin-bottom: 10px;
        }

        /* RIGHT */
        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .card-auth {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);
        }

        .card-auth h3 {
            font-size: 26px;
            margin-bottom: 8px;
            color: #0f172a;
        }

        .card-auth p {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 25px;
        }

        /* INPUT */
        .form-group {
            margin-bottom: 18px;
        }

        .input-box {
            position: relative;
        }

        .input-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .input {
            width: 100%;
            padding: 13px 15px 13px 42px;
            border: none;
            border-radius: 14px;
            background: #f1f5f9;
            font-size: 13px;
            transition: 0.3s;
        }

        .input:focus {
            outline: none;
            background: white;
            border: 1px solid #2563eb;
        }

        /* BUTTON */
        .btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 50px;
            background: #2563eb;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        /* OPTIONS */
        .options {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .options a {
            color: #2563eb;
            text-decoration: none;
        }

        /* TOGGLE */
        .toggle {
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
        }

        .toggle a {
            color: #2563eb;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
        }

        /* HIDDEN */
        .hidden {
            display: none;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #94a3b8;
        }

        /* RESPONSIVE */
        @media(max-width:768px) {

            .container-auth {
                flex-direction: column;
            }

            .left {
                padding: 35px;
                text-align: center;
            }

            .features {
                grid-template-columns: 1fr;
            }

        }
    </style>
</head>

<body>

    <div class="container-auth">

        <!-- LEFT -->
        <div class="left">

            <h1>🎓 Sistem Rekomendasi Perencanaan Karier</h1>

            <p>
                Aplikasi ini menyediakan layanan rekomendasi karier untuk membantu pengguna memahami potensi dan
                kecocokan bidang pekerjaan berdasarkan hasil screening kompetensi.
            </p>

            <div class="features">

                <div class="feature">
                    <i class="fas fa-chart-line"></i>
                    <br>
                    <b>Analisis Kompetensi</b>
                    <br>
                    Identifikasi kemampuan mahasiswa
                </div>

                <div class="feature">
                    <i class="fas fa-briefcase"></i>
                    <br>
                    <b>Rekomendasi Karier</b>
                    <br>
                    Karier paling sesuai dengan profil pengguna
                </div>

                <div class="feature">
                    <i class="fas fa-calculator"></i>
                    <br>
                    <b>Metode SAW</b>
                    <br>
                    Perhitungan objektif berbasis kompetensi
                </div>

                <div class="feature">
                    <i class="fas fa-map-signs"></i>
                    <br>
                    <b>Perencanaan Masa Depan</b>
                    <br>
                    Membantu mahasiswa menentukan arah karier
                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="right">

            <div class="card-auth">

                <!-- LOGIN -->
                <div id="login-form">

                    <h3>Selamat Datang 👋</h3>
                    <p>Silakan login untuk melanjutkan</p>

                    <form action="{{ url('/login') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="input-box">
                                <i class="fas fa-user"></i>

                                <input type="text" name="username" class="input" placeholder="Username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-box">
                                <i class="fas fa-lock"></i>

                                <input type="password" name="password" class="input" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="options">
                            <label>
                                <input type="checkbox">
                                Ingat Saya
                            </label>

                            <a href="#">Lupa Password?</a>
                        </div>

                        <button class="btn">
                            Masuk Sekarang →
                        </button>

                    </form>

                    <div class="toggle">
                        Belum punya akun?
                        <a onclick="showRegister()">Daftar</a>
                    </div>

                </div>

                <!-- REGISTER -->
                <div id="register-form" class="hidden">

                    <h3>Buat Akun ✨</h3>
                    <p>Daftar untuk mulai menggunakan sistem</p>

                    <form action="{{ url('/register') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="input-box">
                                <i class="fas fa-user"></i>

                                <input type="text" name="nama_pengguna" class="input" placeholder="Nama Lengkap"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-box">
                                <i class="fas fa-id-card"></i>

                                <input type="text" name="username" class="input" placeholder="Username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>

                                <input type="email" name="email_pengguna" class="input" placeholder="Email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-box">
                                <i class="fas fa-lock"></i>

                                <input type="password" name="password" class="input" placeholder="Password" required>
                            </div>
                        </div>

                        <button class="btn">
                            Daftar Sekarang →
                        </button>

                    </form>

                    <div class="toggle">
                        Sudah punya akun?
                        <a onclick="showLogin()">Login</a>
                    </div>

                </div>

                <div class="footer">
                    © 2026 Sistem Perencanaan Karier Mahasiswa
                </div>

            </div>

        </div>

    </div>

    <script>
        function showRegister() {
            document.getElementById('login-form').classList.add('hidden');
            document.getElementById('register-form').classList.remove('hidden');
        }

        function showLogin() {
            document.getElementById('register-form').classList.add('hidden');
            document.getElementById('login-form').classList.remove('hidden');
        }
    </script>

</body>

</html>
