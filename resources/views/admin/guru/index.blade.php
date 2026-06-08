@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-chalkboard-teacher text-primary"></i>
        Data Guru
    </h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Guru
            </h6>

            <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Tambah Guru
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Mata Pelajaran</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($guru as $g)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <i class="fas fa-user-tie text-primary"></i>
                                    {{ $g->nama }}
                                </td>

                                <td>
                                    <i class="fas fa-envelope text-info"></i>
                                    {{ $g->email }}
                                </td>

                                <td>
                                    <i class="fas fa-phone text-success"></i>
                                    {{ $g->no_hp }}
                                </td>

                                <td>
                                    <span class="badge badge-info px-3 py-2">
                                        {{ $g->mata_pelajaran }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('guru.destroy', $g->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data guru ini?')">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-user-slash fa-2x text-secondary mb-2"></i>
                                    <br>
                                    Belum ada data guru
                                </td>

                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
