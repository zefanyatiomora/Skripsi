<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KompasKu - Lupa Password</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
            max-width:500px;
            background:white;
            padding:40px;
            border-radius:24px;
            box-shadow:0 10px 25px rgba(15,23,42,.06);
            border:1px solid #e5e7eb;
        }

        .title{
            font-size:32px;
            font-weight:700;
            color:#111827;
            margin-bottom:10px;
        }

        .desc{
            color:#64748b;
            margin-bottom:25px;
            line-height:1.8;
        }

        .form-group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:600;
        }

        input{
            width:100%;
            height:55px;
            border:1px solid #e5e7eb;
            border-radius:14px;
            padding:0 16px;
            background:#f8fafc;
        }

        input:focus{
            outline:none;
            border-color:#020817;
        }

        .btn{
            width:100%;
            height:55px;
            border:none;
            border-radius:14px;
            background:#020817;
            color:white;
            font-weight:600;
            cursor:pointer;
        }

        .btn:hover{
            background:#111827;
        }

        .back{
            text-align:center;
            margin-top:20px;
        }

        .back a{
            color:#0d4fd7;
            text-decoration:none;
            font-weight:600;
        }

        .alert{
            background:#fee2e2;
            color:#dc2626;
            padding:12px;
            border-radius:10px;
            margin-bottom:20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="title">
            Lupa Password
        </div>

        <div class="desc">
            Masukkan email yang terdaftar untuk membuat password baru.
        </div>

        @if(session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('forgot.password.check') }}">
            @csrf

            <div class="form-group">
                <label>Email Terdaftar</label>

                <input
                    type="email"
                    name="email_pengguna"
                    placeholder="Masukkan email"
                    required>
            </div>

            <button type="submit" class="btn">
                Lanjut
            </button>
        </form>

        <div class="back">
            <a href="{{ route('login') }}">
                Kembali ke Login
            </a>
        </div>

    </div>

</div>

</body>
</html>