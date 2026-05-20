@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Murid</h1>

    <form action="{{ route('murid.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Nama Murid</label>
            <input type="text" name="nama_murid" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nama Orang Tua</label>
            <input type="text" name="nama_orangtua" class="form-control">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control">
        </div>

        <div class="mb-3">
            <label>Alamat</label>

            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <select name="mata_pelajaran" class="form-control">

                <option value="">
                    -- Pilih Mata Pelajaran --
                </option>

                @foreach ($mapel as $m)
                    <option value="{{ $m->nama_mapel }}">
                        {{ $m->nama_mapel }}
                    </option>
                @endforeach

            </select>
        </div>

        <button class="btn btn-primary">

            Simpan

        </button>

    </form>
@endsection
