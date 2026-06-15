@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-edit text-warning"></i>
        Edit Murid
    </h1>

    <div class="card shadow">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-warning">
                Form Edit Murid
            </h6>
        </div>

        <div class="card-body">

            <form action="{{ route('murid.update', $murid->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label><b>Nama Murid</b></label>

                    <input type="text" name="nama_murid" value="{{ old('nama_murid', $murid->nama_murid) }}"
                        class="form-control @error('nama_murid') is-invalid @enderror">

                    @error('nama_murid')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label><b>Nama Orang Tua</b></label>

                    <input type="text" name="nama_orangtua" value="{{ old('nama_orangtua', $murid->nama_orangtua) }}"
                        class="form-control @error('nama_orangtua') is-invalid @enderror">

                    @error('nama_orangtua')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label><b>No HP</b></label>

                    <input type="text" name="no_hp" value="{{ old('no_hp', $murid->no_hp) }}"
                        class="form-control @error('no_hp') is-invalid @enderror">

                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label><b>Alamat</b></label>

                    <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $murid->alamat) }}</textarea>

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
                                {{ old('mata_pelajaran', $murid->mata_pelajaran) == $m->nama_mapel ? 'selected' : '' }}>

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

                <button class="btn btn-warning">
                    <i class="fas fa-save"></i>
                    Update
                </button>

                <a href="{{ route('murid.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

            </form>

        </div>

    </div>
@endsection
