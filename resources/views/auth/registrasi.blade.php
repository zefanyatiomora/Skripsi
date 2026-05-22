<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Registrasi - Sistem Karier</title>

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
    background: linear-gradient(135deg, #1d4ed8, #2563eb);
    color: white;
    padding: 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.left h1 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 15px;
}

.left p {
    font-size: 14px;
    opacity: 0.9;
    line-height: 1.6;
}

/* RIGHT */
.right {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card {
    width: 400px;
    background: white;
    border-radius: 18px;
    padding: 30px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
}

.card h3 {
    margin-bottom: 5px;
}

.card p {
    font-size: 13px;
    color: #64748b;
    margin-bottom: 20px;
}

/* INPUT */
.form-group {
    margin-bottom: 15px;
}

.input {
    width: 100%;
    padding: 12px 15px;
    border-radius: 10px;
    border: none;
    background: #f1f5f9;
    font-size: 13px;
}

/* BUTTON */
.btn {
    width: 100%;
    padding: 12px;
    border-radius: 30px;
    border: none;
    background: #2563eb;
    color: white;
    font-weight: 500;
    cursor: pointer;
}

.btn:hover {
    background: #1e40af;
}

/* TEXT */
.small-text {
    font-size: 12px;
    text-align: center;
    margin-top: 15px;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .container-auth {
        flex-direction: column;
    }

    .left {
        text-align: center;
        padding: 30px;
    }
}
</style>
</head>

<body>

<div class="container-auth">

    <!-- LEFT -->
    <div class="left">
        <h1>Buat Akun Baru</h1>
        <p>
            Daftarkan diri Anda untuk mulai menggunakan sistem perencanaan karier
            berbasis DSS dan metode SAW.
        </p>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <div class="card">

            <h3>Registrasi</h3>
            <p>Lengkapi data di bawah ini</p>

            <form action="{{ url('/register') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input type="text" name="nama" class="input" placeholder="Nama Lengkap" required>
                </div>

                <div class="form-group">
                    <input type="text" name="username" class="input" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="input" placeholder="Email Mahasiswa" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="input" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password_confirmation" class="input" placeholder="Konfirmasi Password" required>
                </div>

                <button class="btn">Daftar Sekarang</button>
            </form>

            <div class="small-text">
                Sudah punya akun? 
                <a href="{{ url('/login') }}" style="color:#2563eb;">Masuk</a>
            </div>

        </div>
    </div>

</div>

</body>
</html>