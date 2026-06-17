@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-graduate text-primary"></i>
        Data Murid
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Murid
            </h6>

            <a href="{{ route('murid.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Tambah Murid
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Murid</th>
                            <th>Nama Orang Tua</th>
                            <th>No HP</th>
                            <th>Mata Pelajaran</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($murid as $m)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <i class="fas fa-user-graduate text-primary"></i>
                                    {{ $m->nama_murid }}
                                </td>

                                <td>
                                    <i class="fas fa-users text-primary"></i>
                                    {{ $m->nama_orangtua }}
                                </td>

                                <td>
                                    <i class="fas fa-phone text-info"></i>
                                    {{ $m->no_hp }}
                                </td>

                                <td>
                                    <span class="badge badge-info px-3 py-2">
                                        {{ $m->mata_pelajaran }}
                                    </span>
                                </td>

                                <td>

                                    <a href="{{ route('murid.edit', $m->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('murid.destroy', $m->id) }}" method="POST" class="form-delete d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data murid ini?')">
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
                                    Belum ada data murid
                                </td>

                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
