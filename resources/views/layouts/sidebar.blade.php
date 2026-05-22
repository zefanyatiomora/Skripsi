<div class="sidebar">

    <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column">

            <!-- DASHBOARD -->
            <li class="nav-item">
                <a href="{{ url('/dashboard-mahasiswa') }}"
                    class="nav-link {{ request()->is('dashboard-mahasiswa') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            {{-- <!-- TES KEMAMPUAN -->
            <li class="nav-item">
                <a href="{{ route('tes.kemampuan') }}" 
                   class="nav-link {{ request()->is('tes-kemampuan*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-brain"></i>
                    <p>Tes Kemampuan</p>
                </a>
            </li> --}}

            <!-- LOGOUT -->
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        class="nav-link border-0 bg-transparent w-100 d-flex align-items-center text-danger">

                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p class="mb-0">Keluar</p>
                    </button>
                </form>
            </li>

        </ul>
    </nav>

</div>
