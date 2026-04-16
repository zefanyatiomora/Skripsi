<div class="sidebar">

    <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column">

            <li class="nav-item">
                <a href="{{ url('/dashboard-mahasiswa') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/profile') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Profile</p>
                </a>
            </li>
                <!-- TES KEMAMPUAN -->
        <li class="nav-item">
            <a href="{{ route('tes.kemampuan') }}" class="nav-link text-white">
                <i class="nav-icon fas fa-brain"></i>
                <p>Tes Kemampuan</p>
            </a>
        </li>

            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link text-danger">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Keluar</p>
                </a>
            </li>

        </ul>
    </nav>

</div>