<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Guru</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">

            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">
                    Les Private Depok
                </div>
            </a>

            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="/guru/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('guru.jadwal') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Jadwal Mengajar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('guru.murid') }}">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Data Murid</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="nav-link btn btn-link text-left" style="text-decoration:none;">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <div class="container-fluid mt-4">

                    @yield('content')

                </div>

            </div>
        </div>

    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
