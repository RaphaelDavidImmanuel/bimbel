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
                    <input type="text" id="nama_mapel" name="nama_mapel" value="{{ old('nama_mapel') }}"
                        class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="Contoh: Matematika">

                    <small id="mapelError" class="text-danger"></small>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const mapel = document.getElementById('nama_mapel');
            const mapelError = document.getElementById('mapelError');

            mapel.addEventListener('input', function() {

                let value = this.value;

                // hanya huruf, spasi dan titik
                let filtered = value.replace(/[^a-zA-Z\s.]/g, '');

                if (value !== filtered) {

                    mapelError.innerText =
                        'Mata pelajaran hanya boleh huruf';

                    this.classList.add('is-invalid');

                } else {

                    mapelError.innerText = '';
                    this.classList.remove('is-invalid');
                }

                this.value = filtered;

            });

        });
    </script>
@endsection
