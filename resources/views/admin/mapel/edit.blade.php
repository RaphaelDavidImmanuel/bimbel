@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        Edit Mata Pelajaran
    </h1>

    <form action="{{ route('mata-pelajaran.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" value="{{ $mapel->nama_mapel }}" class="form-control">
        </div>

        <button class="btn btn-primary">
            Update
        </button>

    </form>
@endsection
