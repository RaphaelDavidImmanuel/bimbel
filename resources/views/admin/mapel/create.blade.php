@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-book text-primary"></i>
        Tambah Mata Pelajaran
    </h1>

    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Tambah Mata Pelajaran
            </h6>
        </div>

        <div class="card-body">
            <form action="{{ route('mata-pelajaran.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label><b>Nama Mata Pelajaran</b></label>
                    <input type="text" name="nama_mapel" value="{{ old('nama_mapel') }}"
                        class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="Contoh: Matematika">
                    @error('nama_mapel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>

                <a href="{{ route('mata-pelajaran.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

            </form>
        </div>
    </div>
@endsection
