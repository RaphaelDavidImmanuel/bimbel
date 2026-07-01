@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <b>Dashboard Admin</b>
    </h1>

    <div class="row">

        {{-- Total Guru --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Guru
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalGuru }}
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Murid --}}
        <div class="col-xl-3 col-md-6 mb-4">
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

        {{-- Total Mata Pelajaran --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Mata Pelajaran
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalMapel }}
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Jadwal --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
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

        {{-- Total Laporan Mengajar --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Laporan
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
    </div>
@endsection
