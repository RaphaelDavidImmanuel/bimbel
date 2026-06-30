@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-edit text-warning"></i>
        Edit Guru
    </h1>

    <div class="card shadow">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">
                Form Edit Guru
            </h6>
        </div>

        <div class="card-body">
            <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label><b>Nama Guru</b></label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $guru->nama) }}"
                        class="form-control @error('nama') is-invalid @enderror">

                    <small id="namaError" class="text-danger"></small>

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label><b>Email</b></label>

                    <input type="email" name="email" value="{{ old('email', $guru->email) }}"
                        class="form-control @error('email') is-invalid @enderror">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label><b>No HP</b></label>
                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $guru->no_hp) }}"
                        class="form-control @error('no_hp') is-invalid @enderror">

                    <small id="hpError" class="text-danger"></small>

                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label><b>Alamat</b></label>

                    <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $guru->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label><b>Mata Pelajaran</b></label>
                    <select name="mata_pelajaran" class="form-control @error('mata_pelajaran') is-invalid @enderror">
                        @foreach ($mapel as $m)
                            <option value="{{ $m->nama_mapel }}"
                                {{ old('mata_pelajaran', $guru->mata_pelajaran) == $m->nama_mapel ? 'selected' : '' }}>
                                {{ $m->nama_mapel }}
                            </option>
                        @endforeach
                    </select>

                    @error('mata_pelajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i>
                        Update
                    </button>

                    <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>

                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ==========================
            // VALIDASI NAMA
            // ==========================

            const nama = document.getElementById('nama');
            const namaError = document.getElementById('namaError');

            nama.addEventListener('input', function() {

                let value = this.value;

                // hanya huruf dan spasi
                let filtered = value.replace(/[^a-zA-Z\s]/g, '');

                if (value !== filtered) {

                    namaError.innerText = 'Nama hanya boleh huruf';

                    this.classList.add('is-invalid');

                } else {

                    namaError.innerText = '';

                    this.classList.remove('is-invalid');

                }

                this.value = filtered;

            });



            // ==========================
            // VALIDASI NO HP
            // ==========================

            const hp = document.getElementById('no_hp');
            const hpError = document.getElementById('hpError');

            hp.addEventListener('input', function() {

                let value = this.value;

                // hanya angka
                let filtered = value.replace(/[^0-9]/g, '');

                // maksimal 15 digit
                if (filtered.length > 15) {
                    filtered = filtered.substring(0, 15);
                    hpError.innerText = 'No HP maksimal 15 digit';
                } else if (value !== filtered) {
                    hpError.innerText = 'No HP hanya boleh angka';
                } else {
                    hpError.innerText = '';
                }

                this.value = filtered;

            });

        });
    </script>
@endsection
