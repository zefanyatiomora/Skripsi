<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Langkah Karir') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- ADMINLTE -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    @stack('css')

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fb;
            color: #111827;
        }

        .wrapper {
            background: #f5f7fb;
        }

 /* ==========================================
   FIX SIDEBAR ADMINLTE
========================================== */
.main-sidebar {
    width: 260px !important;
    background: #f8fafc !important;
    border-right: 1px solid #e2e8f0;
    box-shadow: none !important;

    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;

    overflow-y: auto;
    overflow-x: hidden;

    transition: margin-left .3s ease-in-out;
}
        .sidebar {
            padding-top: 10px;
        }

        /* =======================================================
           BRAND
        ======================================================= */
        .brand-link {
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb !important;
            padding: 20px 18px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-decoration: none !important;
        }

        .brand-title-main {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.2;
        }

        .brand-title-sub {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
            color: #64748b;
            margin-top: 4px;
        }

        /* =======================================================
           SIDEBAR MENU
        ======================================================= */
        .nav-sidebar {
            margin-top: 18px;
            padding: 0 10px;
        }

        .nav-sidebar .nav-item {
            margin-bottom: 8px;
        }

        .nav-sidebar .nav-link {
            border-radius: 14px;
            padding: 13px 15px;
            color: #475569 !important;
            font-size: 15px;
            font-weight: 500;
            transition: all .25s ease;
            display: flex;
            align-items: center;
        }

        .nav-sidebar .nav-link i {
            font-size: 16px;
            margin-right: 12px;
            width: 18px;
            text-align: center;
        }

        .nav-sidebar .nav-link.active {
            background: #dbeafe !important;
            color: #0f172a !important;
            font-weight: 600;
        }

        .nav-sidebar .nav-link:hover {
            background: #eef2ff;
            color: #0f172a !important;
        }

        /* =======================================================
           HEADER
        ======================================================= */
        .main-header {
            margin-left: 260px !important;
            background: #ffffff !important;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: none;
            padding: 10px 20px;
        }

        .main-header .nav-link {
            color: #334155 !important;
        }

        /* =======================================================
           CONTENT
        ======================================================= */
        .content-wrapper {
            margin-left: 260px !important;
            background: #f5f7fb;
            min-height: 100vh;
            padding: 22px;
        }

        .content {
            padding-top: 5px;
        }

        /* =======================================================
           CARD
        ======================================================= */
        .card {
            border-radius: 22px;
            border: 1px solid #e5e7eb;
            box-shadow: none;
            background: #ffffff;
        }

        .card-header {
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            border-radius: 22px 22px 0 0 !important;
        }

        /* =======================================================
           BUTTON
        ======================================================= */
        .btn {
            border-radius: 12px;
            font-weight: 500;
            transition: .25s;
        }

        .btn-primary {
            background: #0f172a;
            border: none;
        }

        .btn-primary:hover {
            background: #1e293b;
        }

        /* =======================================================
           FORM
        ======================================================= */
        .form-control {
            border-radius: 12px;
            border: 1px solid #dbe3ef;
            box-shadow: none !important;
        }

        .form-control:focus {
            border-color: #94a3b8;
        }

        /* =======================================================
           TABLE
        ======================================================= */
        .table {
            color: #334155;
        }

        .table thead th {
            border-bottom: 1px solid #e5e7eb;
            color: #0f172a;
            font-weight: 600;
        }

        /* =======================================================
           FOOTER
        ======================================================= */
        .main-footer {
            margin-left: 260px !important;
            background: transparent;
            border-top: 1px solid #e5e7eb;
            color: #64748b;
            font-size: 13px;
            padding: 16px 24px;
        }

        /* =======================================================
           SCROLLBAR
        ======================================================= */
        ::-webkit-scrollbar {
            width: 7px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 20px;
        }

        /* =======================================================
           RESPONSIVE
        ======================================================= */
        @media(max-width:768px) {

            .main-sidebar {
                width: 250px !important;
            }

            .main-header,
            .content-wrapper,
            .main-footer {
                margin-left: 0 !important;
            }

            .content-wrapper {
                padding: 15px;
            }

            .brand-title-main {
                font-size: 20px;
            }

            .brand-title-sub {
                font-size: 10px;
            }

            .nav-sidebar .nav-link {
                font-size: 14px;
                padding: 12px 14px;
            }
        }
        .main-sidebar {
    height: 100vh !important;
    position: fixed !important;
    overflow-y: auto;
    overflow-x: hidden;
}

.sidebar {
    height: calc(100vh - 80px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding-bottom: 20px;
}

/* MENU */
.nav-sidebar {
    margin-top: 10px;
    padding: 0 12px;
}

.nav-sidebar .nav-link {
    min-height: 52px;
}

/* SUPPORT BOX */
.support-box {
    background: white;
    border: 1px solid #dbe3ef;
    border-radius: 18px;
    padding: 18px;
    margin-bottom: 16px;
}

.support-title {
    font-size: 14px;
    font-weight: 600;
    color: #475569;
    margin-bottom: 14px;
}

.support-btn {
    background: #020817;
    color: white;
    border: none;
    border-radius: 14px;
    width: 100%;
    height: 48px;
    font-weight: 600;
    transition: .25s;
}

.support-btn:hover {
    background: #111827;
}

/* LOGOUT */
.logout-btn {
    border: none;
    background: transparent;
    width: 100%;
    display: flex;
    align-items: center;
    gap: 12px;
    color: #475569;
    padding: 12px 14px;
    border-radius: 14px;
    transition: .25s;
}

.logout-btn:hover {
    background: #eef2ff;
    color: #0f172a;
}

/* MOBILE */
@media(max-width:768px){

    .main-sidebar{
        width:250px !important;
    }

    .brand-link{
        padding:18px 16px;
    }

    .nav-sidebar .nav-link{
        padding:12px 14px;
    }
}
/* ==========================================
   DROPDOWN PROFILE
========================================== */
.dropdown-menu {
    border: 1px solid #e5e7eb !important;
    animation: dropdownFade .2s ease;
}

.dropdown-item {
    font-size: 14px;
    font-weight: 500;
    color: #334155;
    transition: all .2s ease;
}

.dropdown-item:hover {
    background: #f1f5f9;
    color: #0f172a;
}

@keyframes dropdownFade {
    from {
        opacity: 0;
        transform: translateY(8px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">

    <div class="wrapper">

        <!-- HEADER -->
        @include('layouts.header')

        <!-- SIDEBAR -->
        <aside class="main-sidebar elevation-0">

            <a href="{{ url('/') }}" class="brand-link">

                <div class="brand-title-main">
                    Langkah Karir
                </div>

                <div class="brand-title-sub">
                    MAHASISWA
                </div>

            </a>

            @include('layouts.sidebar')

        </aside>

        <!-- CONTENT -->
        <div class="content-wrapper">

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
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('js')

</body>

</html>