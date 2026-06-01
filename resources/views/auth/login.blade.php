<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PathFinder AI</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            min-height:100vh;
            background:#f8fafc;
        }

        .wrapper{
            display:flex;
            min-height:100vh;
        }

        /* ================= LEFT ================= */

        .left-panel{
            flex:1.3;
            background:#eef3ff;
            padding:60px;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .badge{
            display:inline-flex;
            align-items:center;
            gap:8px;

            background:#dbeafe;
            color:#1d4ed8;

            padding:10px 18px;
            border-radius:999px;

            width:max-content;
            margin-bottom:25px;
            font-size:14px;
            font-weight:600;
        }

        .hero-title{
            font-size:58px;
            line-height:1.15;
            font-weight:700;
            color:#0f172a;
            max-width:700px;
            margin-bottom:20px;
        }

        .hero-desc{
            font-size:20px;
            color:#475569;
            line-height:1.8;
            max-width:700px;
            margin-bottom:50px;
        }

        .feature-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:20px;
            max-width:850px;
        }

        .feature-card{
            background:white;
            border-radius:24px;
            padding:28px;
            box-shadow:0 8px 24px rgba(0,0,0,.05);
        }

        .feature-icon{
            width:56px;
            height:56px;
            border-radius:16px;
            background:#eff6ff;

            display:flex;
            align-items:center;
            justify-content:center;

            color:#1d4ed8;
            margin-bottom:18px;
        }

        .feature-title{
            font-size:22px;
            font-weight:600;
            margin-bottom:10px;
            color:#0f172a;
        }

        .feature-desc{
            color:#475569;
            line-height:1.7;
        }

        /* ================= RIGHT ================= */

        .right-panel{
            flex:0.8;
            background:#f8fafc;

            display:flex;
            align-items:center;
            justify-content:center;

            padding:40px;
        }

        .auth-card{
            width:100%;
            max-width:480px;

            background:white;

            border-radius:28px;

            padding:40px;

            box-shadow:0 15px 35px rgba(0,0,0,.08);
        }

        .logo{
            display:flex;
            align-items:center;
            gap:12px;

            margin-bottom:40px;
        }

        .logo-box{
            width:48px;
            height:48px;
            border-radius:12px;
            background:#1d4ed8;
            color:white;

            display:flex;
            align-items:center;
            justify-content:center;
        }

        .logo h4{
            font-size:30px;
            color:#1d4ed8;
            font-weight:700;
        }

        .auth-title{
            font-size:42px;
            font-weight:700;
            color:#0f172a;
            margin-bottom:10px;
        }

        .auth-subtitle{
            color:#64748b;
            margin-bottom:30px;
            line-height:1.8;
        }

        .form-group{
            margin-bottom:20px;
        }

        .form-group label{
            display:block;
            margin-bottom:10px;
            font-weight:500;
        }

        .input-box{
            position:relative;
        }

        .input-box i{
            position:absolute;
            left:18px;
            top:50%;
            transform:translateY(-50%);
            color:#94a3b8;
        }

        .input{
            width:100%;
            height:56px;

            border:1px solid #dbe2ea;
            border-radius:14px;

            padding:0 18px 0 48px;
            font-size:15px;
        }

        .input:focus{
            outline:none;
            border-color:#1d4ed8;
        }

        .eye{
            position:absolute;
            right:18px;
            top:50%;
            transform:translateY(-50%);
            cursor:pointer;
        }

        .option-row{
            display:flex;
            justify-content:space-between;
            align-items:center;

            margin-bottom:25px;
        }

        .option-row a{
            color:#1d4ed8;
            text-decoration:none;
            font-weight:500;
        }

        .btn-login{
            width:100%;
            border:none;
            height:56px;

            border-radius:14px;

            background:#1d4ed8;
            color:white;

            font-size:16px;
            font-weight:600;

            cursor:pointer;
        }

        .btn-login:hover{
            background:#1e40af;
        }

        .switch-form{
            text-align:center;
            margin-top:30px;
            font-size:15px;
        }

        .switch-form a{
            color:#1d4ed8;
            font-weight:600;
            text-decoration:none;
            cursor:pointer;
        }

        .footer{
            margin-top:40px;
            text-align:center;
            color:#94a3b8;
            font-size:13px;
        }

        .hidden{
            display:none;
        }

        /* MOBILE */

        @media(max-width:992px){

            .wrapper{
                flex-direction:column;
            }

            .left-panel{
                padding:30px;
            }

            .hero-title{
                font-size:40px;
            }

            .feature-grid{
                grid-template-columns:1fr;
            }

            .right-panel{
                padding:25px;
            }
        }
    </style>
</head>

<body>

<div class="wrapper">

    <!-- LEFT -->
    <div class="left-panel">

        <div class="badge">
            ✨ Berbasis Kompetensi & SAW
        </div>

        <h1 class="hero-title">
            Sistem Rekomendasi Perencanaan Karier Mahasiswa
        </h1>

        <p class="hero-desc">
            Platform yang membantu mahasiswa menemukan rekomendasi karier
            berdasarkan minat, kompetensi, dan hasil screening yang akurat.
        </p>

        <div class="feature-grid">

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>

                <div class="feature-title">
                    Analisis Kompetensi
                </div>

                <div class="feature-desc">
                    Ukur kesiapan kerja melalui berbagai parameter standar industri.
                </div>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-briefcase"></i>
                </div>

                <div class="feature-title">
                    Rekomendasi Karier
                </div>

                <div class="feature-desc">
                    Dapatkan daftar profesi yang paling sesuai dengan profil unik Anda.
                </div>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-calculator"></i>
                </div>

                <div class="feature-title">
                    Metode SAW
                </div>

                <div class="feature-desc">
                    Perhitungan objektif berbasis Simple Additive Weighting.
                </div>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-map"></i>
                </div>

                <div class="feature-title">
                    Career Planning
                </div>

                <div class="feature-desc">
                    Rancang roadmap karier jangka panjang sejak bangku kuliah.
                </div>
            </div>

        </div>

    </div>

    <!-- RIGHT -->
    <div class="right-panel">

        <div class="auth-card">

            <!-- LOGIN -->
            <div id="loginForm">

                <div class="logo">
                    <div class="logo-box">
                        <i class="fas fa-cube"></i>
                    </div>

                    <h4>PathFinder AI</h4>
                </div>

                <div class="auth-title">
                    Selamat Datang 👋
                </div>

                <div class="auth-subtitle">
                    Silakan login untuk melanjutkan perencanaan karier Anda.
                </div>

                <form method="POST" action="{{ url('/login') }}">
                    @csrf

                    <div class="form-group">
                        <label>Username</label>

                        <div class="input-box">
                            <i class="fas fa-user"></i>

                            <input type="text"
                                class="input"
                                name="username"
                                placeholder="Masukkan username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>

                        <div class="input-box">
                            <i class="fas fa-lock"></i>

                            <input type="password"
                                class="input"
                                name="password"
                                placeholder="Masukkan password">

                            <span class="eye">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <div class="option-row">

                        <label>
                            <input type="checkbox">
                            Ingat Saya
                        </label>

                        <a href="#">
                            Lupa Password?
                        </a>

                    </div>

                    <button class="btn-login">
                        Masuk Sekarang
                    </button>

                </form>

                <div class="switch-form">
                    Belum punya akun?
                    <a onclick="showRegister()">
                        Daftar
                    </a>
                </div>

            </div>

            <!-- REGISTER -->
            <div id="registerForm" class="hidden">

                <div class="logo">
                    <div class="logo-box">
                        <i class="fas fa-cube"></i>
                    </div>

                    <h4>PathFinder AI</h4>
                </div>

                <div class="auth-title">
                    Buat Akun ✨
                </div>

                <div class="auth-subtitle">
                    Daftarkan akun baru untuk memulai perjalanan kariermu.
                </div>

                <form method="POST" action="{{ url('/register') }}">
                    @csrf

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="input" name="nama_pengguna">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="input" name="email_pengguna">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="input" name="username">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="input" name="password">
                    </div>

                    <button class="btn-login">
                        Daftar Sekarang
                    </button>

                </form>

                <div class="switch-form">
                    Sudah punya akun?
                    <a onclick="showLogin()">
                        Login
                    </a>
                </div>

            </div>

            <div class="footer">
                © 2026 CAREER PLANNING SYSTEM
            </div>

        </div>

    </div>

</div>

<script>

function showRegister(){
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('registerForm').classList.remove('hidden');
}

function showLogin(){
    document.getElementById('registerForm').classList.add('hidden');
    document.getElementById('loginForm').classList.remove('hidden');
}

</script>

</body>
</html>