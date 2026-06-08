@extends('layouts.guru')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-calendar-alt text-primary"></i>
        <b>Jadwal Mengajar</b>
    </h1>

    <div class="card shadow mb-4">

        {{-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Jadwal Mengajar
            </h6>
        </div> --}}

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Murid</th>
                            <th>Mata Pelajaran</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($jadwals as $jadwal)
                            <tr>

                                <td>
                                    <span class="badge badge-primary px-3 py-2">
                                        {{ $jadwal->hari }}
                                    </span>
                                </td>

                                <td>
                                    <i class="fas fa-clock text-warning"></i>
                                    {{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}
                                </td>

                                <td>
                                    <i class="fas fa-user-graduate text-success"></i>
                                    {{ $jadwal->murid->nama_murid ?? '-' }}
                                </td>

                                <td>
                                    <span class="badge badge-info px-3 py-2">
                                        {{ $jadwal->mata_pelajaran }}
                                    </span>
                                </td>

                                <td>
                                    <i class="fas fa-map-marker-alt text-danger"></i>
                                    {{ $jadwal->alamat }}
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <i class="fas fa-calendar-times fa-2x text-secondary mb-2"></i>
                                    <br>
                                    Belum ada jadwal mengajar
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
