@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data Guru</h1>

    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">
        Tambah Guru
    </a>

    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Mata Pelajaran</th>
            <th>Aksi</th>
        </tr>

        @foreach ($guru as $g)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $g->nama }}</td>
                <td>{{ $g->email }}</td>
                <td>{{ $g->no_hp }}</td>
                <td>{{ $g->mata_pelajaran }}</td>

                <td>

                    <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('guru.destroy', $g->id) }}" method="POST" style="display:inline;">

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
