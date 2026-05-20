@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Guru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('guru.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
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
            {{-- <select name="mata_pelajaran" class="form-control">

                <option value="">-- Pilih Mata Pelajaran --</option>

                <option value="Calistung">Calistung</option>

                <option value="Matematika">Matematika</option>

                <option value="Bahasa Inggris">Bahasa Inggris</option>

                <option value="Bahasa Indonesia">Bahasa Indonesia</option>

                <option value="Math in English">Math in English</option>

            </select> --}}
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

    </form>
@endsection
