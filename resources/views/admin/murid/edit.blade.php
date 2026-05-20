@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Murid</h1>

    <form action="{{ route('murid.update', $murid->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Nama Murid</label>

            <input type="text" name="nama_murid" value="{{ $murid->nama_murid }}" class="form-control">

        </div>

        <div class="mb-3">

            <label>Nama Orang Tua</label>

            <input type="text" name="nama_orangtua" value="{{ $murid->nama_orangtua }}" class="form-control">

        </div>

        <div class="mb-3">

            <label>No HP</label>

            <input type="text" name="no_hp" value="{{ $murid->no_hp }}" class="form-control">

        </div>

        <div class="mb-3">

            <label>Alamat</label>

            <textarea name="alamat" class="form-control">{{ $murid->alamat }}</textarea>

        </div>

        <div class="mb-3">

            <label>Mata Pelajaran</label>
            <select name="mata_pelajaran" class="form-control">

                @foreach ($mapel as $m)
                    <option value="{{ $m->nama_mapel }}" {{ $murid->mata_pelajaran == $m->nama_mapel ? 'selected' : '' }}>

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
