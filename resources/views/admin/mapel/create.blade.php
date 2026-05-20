@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        Tambah Mata Pelajaran
    </h1>

    <form action="{{ route('mata-pelajaran.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" class="form-control">
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>
    </form>
@endsection
