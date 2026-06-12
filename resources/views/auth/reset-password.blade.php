<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KompasKu - Reset Password</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f3f5f9;
            border-top:5px solid #020817;
        }

        .container{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:30px;
        }

        .card{
            width:100%;
            max-width:520px;
            background:white;
            border-radius:24px;
            padding:40px;
            border:1px solid #e5e7eb;
            box-shadow:0 10px 25px rgba(15,23,42,.06);
        }

        .title{
            font-size:32px;
            font-weight:700;
            color:#111827;
            margin-bottom:8px;
        }

        .desc{
            color:#64748b;
            line-height:1.8;
            margin-bottom:30px;
        }

        .form-group{
            margin-bottom:20px;
        }

        .form-label{
            display:block;
            font-weight:600;
            margin-bottom:8px;
            color:#1f2937;
        }

        .input-wrapper{
            position:relative;
        }

        .input-wrapper i{
            position:absolute;
            right:18px;
            top:50%;
            transform:translateY(-50%);
            color:#94a3b8;
            cursor:pointer;
        }

        .form-input{
            width:100%;
            height:56px;
            border:1px solid #e5e7eb;
            border-radius:14px;
            padding:0 18px;
            font-size:14px;
            background:#f8fafc;
            transition:.25s;
        }

        .form-input:focus{
            outline:none;
            border-color:#020817;
            background:white;
            box-shadow:0 0 0 4px rgba(15,23,42,.05);
        }

        .btn{
            width:100%;
            height:56px;
            border:none;
            border-radius:14px;
            background:#020817;
            color:white;
            font-size:15px;
            font-weight:600;
            cursor:pointer;
            transition:.25s;
        }

        .btn:hover{
            background:#111827;
            transform:translateY(-2px);
        }

        .back-link{
            text-align:center;
            margin-top:20px;
        }

        .back-link a{
            text-decoration:none;
            color:#0d4fd7;
            font-weight:600;
        }

        .alert{
            background:#fee2e2;
            color:#dc2626;
            padding:12px;
            border-radius:10px;
            margin-bottom:20px;
        }

        @media(max-width:576px){
            .card{
                padding:25px;
            }

            .title{
                font-size:26px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="title">
            Buat Password Baru
        </div>

        <div class="desc">
            Masukkan password baru untuk akun Anda. Gunakan kombinasi huruf dan angka agar lebih aman.
        </div>

        @if ($errors->any())
            <div class="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('reset.password') }}">
            @csrf

            <input
                type="hidden"
                name="email_pengguna"
                value="{{ $email }}">

            <div class="form-group">

                <label class="form-label">
                    Password Baru
                </label>

                <div class="input-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Masukkan password baru"
                        required>

                    <i class="fas fa-eye"
                       onclick="togglePassword('password', this)">
                    </i>

                </div>

            </div>

            <div class="form-group">

                <label class="form-label">
                    Konfirmasi Password
                </label>

                <div class="input-wrapper">

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-input"
                        placeholder="Ulangi password baru"
                        required>

                    <i class="fas fa-eye"
                       onclick="togglePassword('password_confirmation', this)">
                    </i>

                </div>

            </div>

            <button type="submit" class="btn">
                Simpan Password
            </button>

        </form>

        <div class="back-link">
            <a href="{{ route('login') }}">
                Kembali ke Login
            </a>
        </div>

    </div>

</div>

<script>
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
</script>

</body>
</html>