<nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #0f1f43;">
    
    <!-- Left -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Right -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-flex align-items-center">

            @if(Auth::check())
                <a href="{{ url('/profile') }}" class="nav-link d-flex align-items-center">

                    <span class="mr-2">
                        {{ Auth::user()->nama_pengguna }} | {{ Auth::user()->role }}
                    </span>

                    <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center"
                         style="width: 30px; height: 30px;">
                        {{ strtoupper(substr(Auth::user()->nama_pengguna, 0, 1)) }}
                    </div>

                </a>
            @else
                <span class="text-white mr-3">Guest</span>
            @endif

        </li>
    </ul>
</nav>