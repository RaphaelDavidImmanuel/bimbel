@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        Mata Pelajaran
    </h1>

    <a href="{{ route('mata-pelajaran.create') }}" class="btn btn-primary mb-3">
        Tambah Mata Pelajaran
    </a>

    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Nama Mata Pelajaran</th>
            <th>Aksi</th>
        </tr>

        @foreach ($mapel as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m->nama_mapel }}</td>
                <td>

                    <a href="{{ route('mata-pelajaran.edit', $m->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('mata-pelajaran.destroy', $m->id) }}" method="POST" style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
