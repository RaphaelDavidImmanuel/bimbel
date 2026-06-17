@extends('layouts.guru')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">
            Dashboard Guru
        </h1>
    </div>

    <div class="card shadow mb-4 border-left-primary">
        <div class="card-body">

            <h5 class="font-weight-bold text-primary">
                Selamat Datang, {{ $guru->nama }}
            </h5>

            @if ($notifJadwal->count() > 0)
                <div class="alert alert-warning shadow">
                    <h5 class="mb-3">
                        🔔 Jadwal Baru Ditambahkan
                    </h5>

                    <ul class="mb-0">
                        @foreach ($notifJadwal as $notif)
                            <li>
                                <b>{{ $notif->hari }}</b>
                                jam
                                <b>{{ substr($notif->jam, 0, 5) }}</b>
                                -
                                {{ $notif->murid->nama_murid }}
                                ({{ $notif->mata_pelajaran }})
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- <p class="mb-0 text-gray-600">
                Mata Pelajaran : {{ $guru->mata_pelajaran }}
            </p> --}}

        </div>
    </div>

    <div class="row">

        {{-- Total Jadwal --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Jadwal
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalJadwal }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- Total Murid --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Murid
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalMurid }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- Mata Pelajaran --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Mata Pelajaran
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $guru->mata_pelajaran }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Jadwal Hari Ini
                </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Jam</th>
                                <th>Murid</th>
                                <th>Mata Pelajaran</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($jadwalHariIni as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->jam }}</td>
                                    <td>{{ $jadwal->murid->nama_murid }}</td>
                                    <td>{{ $jadwal->mata_pelajaran }}</td>
                                    <td>{{ $jadwal->alamat }}</td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="4" class="text-center">
                                        Tidak ada jadwal mengajar hari ini
                                    </td>

                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
