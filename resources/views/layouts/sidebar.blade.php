<div class="sidebar">
    <div>
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column">
                {{-- =========================
                    SIDEBAR ADMIN
                ========================== --}}
                @if (Auth::user()->role == 'admin')
                    <!-- DASHBOARD ADMIN -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard.admin') }}"
                            class="nav-link {{ request()->is('dashboard-admin') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p class="mb-0">
                                Dashboard Admin
                            </p>
                        </a>
                    </li>
                    <!-- PENGGUNA -->
                    <li class="nav-item">
                        <a href="{{ route('pengguna.index') }}"
                            class="nav-link {{ request()->is('pengguna') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th-large"></i>
                            <p class="mb-0">
                                Pengguna
                            </p>
                        </a>
                    </li>

                    <!-- OKUPASI -->
                    <li class="nav-item">

                        <a href="{{ route('okupasi.index') }}"
                            class="nav-link {{ request()->is('okupasi') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-briefcase"></i>

                            <p class="mb-0">
                                Okupasi
                            </p>

                        </a>

                    </li>

                    <!-- SCREENING -->
                    <li class="nav-item">

                        <a href="{{ route('screening.admin.index') }}"
                            class="nav-link {{ request()->is('screening-admin*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-clipboard-check"></i>

                            <p class="mb-0">
                                Screening
                            </p>

                        </a>

                    </li>
                    <!-- AREA FUNGSI -->
                    <li class="nav-item">

                        <a href="{{ route('area-fungsi.index') }}"
                            class="nav-link {{ request()->is('area-fungsi*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-sitemap"></i>

                            <p class="mb-0">
                                Area Fungsi
                            </p>

                        </a>

                    </li>
                    <!-- CLUSTER SKILL -->
                    <li class="nav-item">

                        <a href="{{ route('cluster-skill.index') }}"
                            class="nav-link {{ request()->is('cluster-skill*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-layer-group"></i>

                            <p class="mb-0">
                                Cluster Skill
                            </p>

                        </a>

                    </li>
                @else
                    {{-- =========================
                    SIDEBAR MAHASISWA
                ========================== --}}

                    <!-- DASHBOARD -->
                    <li class="nav-item">

                        <a href="{{ route('dashboard.mahasiswa') }}"
                            class="nav-link {{ request()->is('dashboard-mahasiswa') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-th-large"></i>

                            <p class="mb-0">
                                Dashboard
                            </p>

                        </a>

                    </li>

                    <!-- PANDUAN -->
                    <li class="nav-item">

                        <a href="#" class="nav-link">

                            <i class="nav-icon fas fa-book-open"></i>

                            <p class="mb-0">
                                Panduan
                            </p>

                        </a>

                    </li>
                @endif

            </ul>

        </nav>

    </div>

    <!-- BOTTOM SECTION -->
<div class="px-3">

    @if(Auth::user()->role != 'admin')

        <!-- SUPPORT -->
        <div class="support-box">

            <div class="support-title">
                Butuh Bantuan?
            </div>

            <button class="support-btn">
                Kontak Support
            </button>

        </div>

    @endif

    <!-- LOGOUT -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit" class="logout-btn">

            <i class="fas fa-sign-out-alt"></i>

            <span>Keluar</span>

        </button>

    </form>

</div>
</div>
