<nav class="main-header navbar navbar-expand navbar-light">

    <!-- LEFT -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- RIGHT -->
    <ul class="navbar-nav ml-auto align-items-center">

        <!-- NOTIF -->
        <li class="nav-item mr-2">
            <a class="nav-link" href="#">
                <i class="far fa-bell"></i>
            </a>
        </li>

        <!-- SETTINGS -->
        <li class="nav-item mr-3">
            <a class="nav-link" href="#">
                <i class="fas fa-cog"></i>
            </a>
        </li>

        <!-- USER -->
@if(Auth::check())

<li class="nav-item dropdown">

    <a class="nav-link d-flex align-items-center"
       data-toggle="dropdown"
       href="#"
       style="cursor:pointer;">

        <div class="text-right mr-3">

            <div style="
                font-weight:600;
                color:#111827;
                line-height:1;
            ">
                {{ Auth::user()->nama_pengguna }}
            </div>

            <small style="
                color:#64748b;
                font-size:12px;
            ">
                {{ ucfirst(Auth::user()->role) }}
            </small>

        </div>

        <div class="rounded-circle d-flex align-items-center justify-content-center"
             style="
                width:42px;
                height:42px;
                background:#dbeafe;
                color:#0f172a;
                font-weight:700;
                font-size:16px;
             ">

            {{ strtoupper(substr(Auth::user()->nama_pengguna,0,1)) }}

        </div>

    </a>

    <!-- DROPDOWN -->
    <div class="dropdown-menu dropdown-menu-right shadow border-0"
         style="
            min-width:220px;
            border-radius:16px;
            padding:10px;
         ">

        <!-- HEADER -->
        <div style="
            padding:12px;
            border-bottom:1px solid #e5e7eb;
            margin-bottom:8px;
        ">

            <div style="
                font-weight:600;
                color:#111827;
            ">
                {{ Auth::user()->nama_pengguna }}
            </div>

            <small style="color:#64748b;">
                {{ Auth::user()->email_pengguna }}
            </small>

        </div>

        <!-- PROFILE -->
        <a href="{{ route('profile.index') }}"
           class="dropdown-item"
           style="
                border-radius:10px;
                padding:10px 12px;
           ">

            <i class="fas fa-user mr-2"></i>
            Profil Saya

        </a>

        <!-- SETTINGS -->
        <a href="#"
           class="dropdown-item"
           style="
                border-radius:10px;
                padding:10px 12px;
           ">

            <i class="fas fa-cog mr-2"></i>
            Pengaturan

        </a>

        <div class="dropdown-divider"></div>

        <!-- LOGOUT -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit"
                    class="dropdown-item text-danger"
                    style="
                        border-radius:10px;
                        padding:10px 12px;
                    ">

                <i class="fas fa-sign-out-alt mr-2"></i>
                Keluar

            </button>
        </form>

    </div>

</li>

@endif

    </ul>

</nav>