@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-plus text-primary"></i>
        Tambah Guru
    </h1>

    <div class="card shadow">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Tambah Guru
            </h6>
        </div>

        <div class="card-body">
            <form action="{{ route('guru.store') }}" method="POST">
                @csrf
                {{-- <div class="mb-3">
                    <label><b>Nama Guru</b></label>

                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                        class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama guru">

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label><b>Nama Guru</b></label>

                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                        class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama guru">

                    <small id="namaError" class="text-danger"></small>

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label><b>Email</b></label>

                    <input type="email" id="email" name="email" value="{{ old('email') }}" maxlength="100"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email">

                    <small id="emailError" class="text-danger"></small>

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label><b>No HP</b></label>

                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                        class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan nomor HP">

                    <small id="hpError" class="text-danger"></small>

                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label><b>No HP</b></label>

                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                        class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan nomor HP">

                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label><b>Alamat</b></label>

                    <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror"
                        placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label><b>Mata Pelajaran</b></label>

                    <select name="mata_pelajaran" class="form-control @error('mata_pelajaran') is-invalid @enderror">
                        <option value="">
                            -- Pilih Mata Pelajaran --
                        </option>

                        @foreach ($mapel as $m)
                            <option value="{{ $m->nama_mapel }}"
                                {{ old('mata_pelajaran') == $m->nama_mapel ? 'selected' : '' }}>
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
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan
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
            // VALIDASI EMAIL
            const email = document.getElementById('email');
            const emailError = document.getElementById('emailError');

            email.addEventListener('input', function() {

                let value = this.value;

                // validasi email
                let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (this.value !== '' && !pattern.test(this.value)) {

                    emailError.innerText =
                        'Format email tidak valid';

                    this.classList.add('is-invalid');

                } else {

                    emailError.innerText = '';

                    this.classList.remove('is-invalid');

                }

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
