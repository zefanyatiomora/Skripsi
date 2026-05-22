<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Sistem Perencanaan Karir') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    @stack('css')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }

        .content-wrapper {
            padding: 20px;
            background-color: #f8fafc;
        }

        /* SIDEBAR */
        .main-sidebar {
            background: #0f172a !important;
        }

        .brand-link {
            text-align: center;
            font-weight: 600;
            font-size: 18px;
            color: white !important;
        }

        .nav-sidebar .nav-link {
            border-radius: 10px;
            margin: 5px 10px;
        }

        .nav-sidebar .nav-link.active {
            background: #f46a10 !important;
            color: white !important;
        }

        .nav-sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
        }

        /* HEADER */
        .main-header {
            background: #0f172a;
            border: none;
        }

        /* CARD */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.05);
        }

        /* BUTTON */
        .btn {
            border-radius: 50px;
            font-size: 14px;
            padding: 8px 18px;
        }

        .btn-primary {
            background-color: #2563eb;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        /* FOOTER */
        .main-footer {
            background: #0f172a;
            color: #ffffff;
            text-align: center;
            font-size: 13px;
            padding: 10px;
            border-top: 3px solid #f46a10;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 10px;
            }
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- HEADER -->
    @include('layouts.header')

    <!-- SIDEBAR -->
    <aside class="main-sidebar elevation-4">
        
        <a href="{{ url('/') }}" class="brand-link">
            🚀 KarirKu
        </a>

        @include('layouts.sidebar')

    </aside>

    <!-- CONTENT -->
    <div class="content-wrapper">

        @include('layouts.breadcrumb')

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>

    </div>

    <!-- FOOTER -->
    @include('layouts.footer')

</div>

<!-- JS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

@stack('js')

</body>
</html>