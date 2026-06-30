@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit text-warning"></i>
        Edit Mata Pelajaran
    </h1>

    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-warning">
                Form Edit Mata Pelajaran
            </h6>
        </div>

        <div class="card-body">
            <form action="{{ route('mata-pelajaran.update', $mapel->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label><b>Nama Mata Pelajaran</b></label>
                    <input type="text" name="nama_mapel" value="{{ old('nama_mapel', $mapel->nama_mapel) }}"
                        class="form-control @error('nama_mapel') is-invalid @enderror">
                    @error('nama_mapel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-warning">
                    <i class="fas fa-save"></i>
                    Update
                </button>

                <a href="{{ route('mata-pelajaran.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

            </form>
        </div>
    </div>
@endsection
