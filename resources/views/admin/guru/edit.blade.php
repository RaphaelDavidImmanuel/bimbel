@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Guru</h1>

    <form action="{{ route('guru.update', $guru->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $guru->nama }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $guru->email }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ $guru->no_hp }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $guru->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <select name="mata_pelajaran" class="form-control">

                @foreach ($mapel as $m)
                    <option value="{{ $m->nama_mapel }}" {{ $guru->mata_pelajaran == $m->nama_mapel ? 'selected' : '' }}>
                        {{ $m->nama_mapel }}
                    </option>
                @endforeach

            </select>
        </div>

        <button class="btn btn-primary">
            Update
        </button>

    </form>
@endsection
