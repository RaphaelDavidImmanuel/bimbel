<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">

            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">
                    Les Private Depok
                </div>
            </a>

            <hr class="sidebar-divider">
            <!-- Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Data Guru -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guru.index') }}">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Data Guru</span>
                </a>
            </li>

            <!-- Data Murid -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('murid.index') }}">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Data Murid</span>
                </a>
            </li>

            <!-- Mata Pelajaran -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mata-pelajaran.index') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Mata Pelajaran</span>
                </a>
            </li>

            <!-- Jadwal -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('jadwal.index') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Jadwal</span>
                </a>
            </li>

            <!-- Laporan Mengajar -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('laporan.index') }}">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan Mengajar</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Logout -->
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

        <!-- Content -->
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6'
            });
        </script>
    @endif

    @if (session('delete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('delete') }}',
                confirmButtonColor: '#d33'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Jadwal Bentrok',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33'
            });
        </script>
    @endif

    <script>
        document.querySelectorAll('.form-delete').forEach(form => {

            form.addEventListener('submit', function(e) {

                e.preventDefault();

                Swal.fire({
                    title: 'Yakin hapus data?',
                    text: 'Data tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {

                    if (result.isConfirmed) {
                        form.submit();
                    }

                });

            });

        });
    </script>

</body>

</html>
