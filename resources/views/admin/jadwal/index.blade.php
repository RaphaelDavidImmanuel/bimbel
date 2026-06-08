@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-calendar-alt text-primary"></i>
        Jadwal Les
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Jadwal Les
            </h6>

            <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Tambah Jadwal
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Guru</th>
                            <th>Murid</th>
                            <th>Mata Pelajaran</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($jadwal as $j)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <i class="fas fa-chalkboard-teacher text-primary"></i>
                                    {{ $j->guru->nama }}
                                </td>

                                <td>
                                    <i class="fas fa-user-graduate text-success"></i>
                                    {{ $j->murid->nama_murid }}
                                </td>

                                <td>
                                    <span class="badge badge-info px-3 py-2">
                                        {{ $j->mata_pelajaran }}
                                    </span>
                                </td>

                                <td>
                                    <span class="badge badge-primary px-3 py-2">
                                        {{ $j->hari }}
                                    </span>
                                </td>

                                <td>
                                    <i class="fas fa-clock text-warning"></i>
                                    {{ \Carbon\Carbon::parse($j->jam)->format('H:i') }}
                                </td>
                                <td>

                                    <a href="{{ route('jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="fas fa-calendar-times fa-2x text-secondary mb-2"></i>
                                    <br>
                                    Belum ada jadwal les
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
