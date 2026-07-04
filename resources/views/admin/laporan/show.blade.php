@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-file-alt text-primary"></i>
        Detail Laporan Mengajar
    </h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Informasi Laporan
            </h6>
        </div>

        <div class="card-body">
            <div class="row">
                {{-- Informasi Guru --}}
                <div class="col-md-6 mb-4">
                    <div class="border rounded p-3 h-100">

                        <h5 class="text-primary mb-3">
                            <i class="fas fa-chalkboard-teacher"></i>
                            Data Guru
                        </h5>

                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Nama Guru</th>
                                <td>{{ $laporan->guru->nama }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $laporan->guru->email }}</td>
                            </tr>

                            <tr>
                                <th>No HP</th>
                                <td>{{ $laporan->guru->no_hp }}</td>
                            </tr>

                        </table>
                    </div>
                </div>

                {{-- Informasi Murid --}}
                <div class="col-md-6 mb-4">
                    <div class="border rounded p-3 h-100">
                        <h5 class="text-success mb-3">
                            <i class="fas fa-user-graduate"></i>
                            Data Murid
                        </h5>

                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Nama Murid</th>
                                <td>{{ $laporan->murid->nama_murid }}</td>
                            </tr>

                            <tr>
                                <th>Orang Tua</th>
                                <td>{{ $laporan->murid->nama_orangtua }}</td>
                            </tr>

                            <tr>
                                <th>No HP</th>
                                <td>{{ $laporan->murid->no_hp }}</td>
                            </tr>

                            <tr>
                                <th>Alamat</th>
                                <td>{{ $laporan->murid->alamat }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Informasi Mengajar --}}

            <div class="border rounded p-3 mb-4">

                <h5 class="text-info mb-3">
                    <i class="fas fa-book"></i>
                    Informasi Mengajar
                </h5>

                <table class="table table-borderless">

                    <tr>
                        <th width="180">Mata Pelajaran</th>
                        <td>{{ $laporan->jadwal->mata_pelajaran }}</td>
                    </tr>

                    <tr>
                        <th>Hari</th>
                        <td>{{ $laporan->jadwal->hari }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal</th>
                        <td>
                            {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d F Y') }}
                        </td>
                    </tr>

                    <tr>
                        <th>Jam Mengajar</th>
                        <td>

                            {{ substr($laporan->jam_mulai, 0, 5) }}
                            -
                            {{ substr($laporan->jam_selesai, 0, 5) }}

                        </td>
                    </tr>

                    <tr>

                        <th>Status</th>

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
                    </tr>
                </table>

            </div>

            {{-- Materi --}}
            <div class="border rounded p-3 mb-4">
                <h5 class="text-primary">
                    <i class="fas fa-book-open"></i>
                    Materi Pembelajaran
                </h5>

                <p class="mt-3">
                    {{ $laporan->materi }}
                </p>

            </div>

            {{-- Catatan --}}
            <div class="border rounded p-3 mb-4">
                <h5 class="text-danger">
                    <i class="fas fa-sticky-note"></i>
                    Catatan Guru
                </h5>

                <p class="mt-3">
                    {{ $laporan->catatan ?? '-' }}
                </p>

            </div>

            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>

        </div>

    </div>
@endsection
