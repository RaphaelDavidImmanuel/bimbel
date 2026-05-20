@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        Jadwal Les
    </h1>

    <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">
        Tambah Jadwal
    </a>

    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Guru</th>
            <th>Murid</th>
            <th>Mapel</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Aksi</th>
        </tr>

        @foreach ($jadwal as $j)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $j->guru->nama }}</td>
                <td>{{ $j->murid->nama_murid }}</td>
                <td>{{ $j->mata_pelajaran }}</td>
                <td>{{ $j->hari }}</td>
                <td>{{ $j->jam }}</td>
                <td>

                    <a href="{{ route('jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" style="display:inline;">

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
