@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-calendar-plus text-primary"></i>
        Tambah Jadwal
    </h1>

    <div class="card shadow">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Tambah Jadwal Les
            </h6>
        </div>

        <div class="card-body">

            <form action="{{ route('jadwal.store') }}" method="POST">

                @csrf

                {{-- Guru --}}
                <div class="mb-3">

                    <label><b>Guru</b></label>

                    <select name="guru_id" id="guruSelect" class="form-control @error('guru_id') is-invalid @enderror">

                        <option value="">
                            -- Pilih Guru --
                        </option>

                        @foreach ($guru as $g)
                            <option value="{{ $g->id }}" data-mapel="{{ $g->mata_pelajaran }}"
                                {{ old('guru_id') == $g->id ? 'selected' : '' }}>

                                {{ $g->nama }}
                                - {{ $g->mata_pelajaran }}

                            </option>
                        @endforeach

                    </select>

                    @error('guru_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Murid --}}
                <div class="mb-3">

                    <label><b>Murid</b></label>

                    <select name="murid_id" id="muridSelect" class="form-control @error('murid_id') is-invalid @enderror">

                        <option value="">
                            -- Pilih Murid --
                        </option>

                        @foreach ($murid as $m)
                            <option value="{{ $m->id }}" data-mapel="{{ $m->mata_pelajaran }}"
                                data-alamat="{{ $m->alamat }}" {{ old('murid_id') == $m->id ? 'selected' : '' }}>

                                {{ $m->nama_murid }}

                            </option>
                        @endforeach

                    </select>

                    @error('murid_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Mata Pelajaran --}}
                <div class="mb-3">

                    <label><b>Mata Pelajaran</b></label>

                    <input type="text" name="mata_pelajaran" id="mapelInput" value="{{ old('mata_pelajaran') }}"
                        class="form-control @error('mata_pelajaran') is-invalid @enderror" readonly>

                    @error('mata_pelajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Hari --}}
                <div class="mb-3">

                    <label><b>Hari</b></label>

                    <select name="hari" class="form-control @error('hari') is-invalid @enderror">

                        <option value="">-- Pilih Hari --</option>

                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>

                    </select>

                    @error('hari')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Jam --}}
                <div class="mb-3">

                    <label><b>Jam</b></label>

                    <input type="time" name="jam" value="{{ old('jam') }}"
                        class="form-control @error('jam') is-invalid @enderror">

                    @error('jam')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Alamat --}}
                <div class="mb-3">

                    <label><b>Alamat</b></label>

                    <textarea name="alamat" id="alamatInput" rows="3" class="form-control @error('alamat') is-invalid @enderror"
                        readonly>{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <button class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>

                <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Kembali

                </a>

            </form>

        </div>

    </div>

    <script>
        document.getElementById('muridSelect')
            .addEventListener('change', function() {

                let selectedOption =
                    this.options[this.selectedIndex];

                let mapel =
                    selectedOption.getAttribute('data-mapel');

                let alamat =
                    selectedOption.getAttribute('data-alamat');

                document.getElementById('mapelInput').value =
                    mapel ?? '';

                document.getElementById('alamatInput').value =
                    alamat ?? '';

                let guruSelect =
                    document.getElementById('guruSelect');

                let guruOptions =
                    guruSelect.options;

                for (let i = 0; i < guruOptions.length; i++) {

                    let guruMapel =
                        guruOptions[i].getAttribute('data-mapel');

                    if (
                        guruMapel == mapel ||
                        guruMapel == null
                    ) {
                        guruOptions[i].style.display = '';
                    } else {
                        guruOptions[i].style.display = 'none';
                    }

                }

            });
    </script>
@endsection
