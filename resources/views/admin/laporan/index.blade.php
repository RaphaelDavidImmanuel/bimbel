@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-file-alt text-primary"></i>
        Rekap Laporan Mengajar
    </h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">

            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Laporan Mengajar
            </h6>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="bg-primary text-white">

                        <tr>

                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Guru</th>
                            <th>Murid</th>
                            <th>Mata Pelajaran</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($laporans as $laporan)
                            <tr>

                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $laporans->firstItem() + $loop->index }}</td>

                                <td>
                                    <i class="fas fa-calendar text-primary"></i>
                                    {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') }}
                                </td>

                                <td>
                                    <i class="fas fa-user-tie text-primary"></i>
                                    {{ $laporan->guru->nama }}
                                </td>

                                <td>
                                    <i class="fas fa-user-graduate text-success"></i>
                                    {{ $laporan->murid->nama_murid }}
                                </td>

                                <td>

                                    <span class="badge badge-info px-3 py-2">

                                        {{ $laporan->jadwal->mata_pelajaran }}

                                    </span>

                                </td>

                                <td>

                                    @if ($laporan->status == 'Selesai')
                                        <span class="badge badge-success px-3 py-2">

                                            {{ $laporan->status }}

                                        </span>
                                    @else
                                        <span class="badge badge-warning px-3 py-2">

                                            {{ $laporan->status }}

                                        </span>
                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-info btn-sm">

                                        <i class="fas fa-eye"></i>

                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-4">

                                    <i class="fas fa-file-alt fa-2x text-secondary mb-2"></i>

                                    <br>

                                    Belum ada laporan mengajar.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $laporans->links() }}
    </div>
@endsection
