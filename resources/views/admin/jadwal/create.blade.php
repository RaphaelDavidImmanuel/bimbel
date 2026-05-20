@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        Tambah Jadwal
    </h1>

    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Guru</label>
            <select name="guru_id" id="guruSelect" class="form-control">
                <option value="">
                    -- Pilih Guru --
                </option>

                @foreach ($guru as $g)
                    <option value="{{ $g->id }}" data-mapel="{{ $g->mata_pelajaran }}">
                        {{ $g->nama }}
                        - {{ $g->mata_pelajaran }}
                    </option>
                @endforeach
            </select>

        </div>

        {{-- <div class="mb-3">
            <label>Guru</label>
            <select name="guru_id" class="form-control">
                @foreach ($guru as $g)
                    <option value="{{ $g->id }}">
                        {{ $g->nama }}
                    </option>
                @endforeach
            </select>
        </div> --}}

        <div class="mb-3">
            <label>Murid</label>
            <select name="murid_id" id="muridSelect" class="form-control">
                <option value="">
                    -- Pilih Murid --
                </option>

                @foreach ($murid as $m)
                    <option value="{{ $m->id }}" data-mapel="{{ $m->mata_pelajaran }}"
                        data-alamat="{{ $m->alamat }}">
                        {{ $m->nama_murid }}
                    </option>
                @endforeach

            </select>
        </div>
        
            <div class="mb-3">
                <label>Mata Pelajaran</label>
                <input type="text" name="mata_pelajaran" id="mapelInput" class="form-control" readonly>
            </div>

            {{-- <select name="mata_pelajaran" class="form-control">

                <option value="">
                    -- Pilih Mata Pelajaran --
                </option>

                @foreach ($mapel as $m)
                    <option value="{{ $m->nama_mapel }}">
                        {{ $m->nama_mapel }}
                    </option>
                @endforeach
            </select> --}}
        </div>

        <div class="mb-3">
            <label>Hari</label>
            <select name="hari" class="form-control">
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jam</label>
            <input type="time" name="jam" class="form-control">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" id="alamatInput" class="form-control" readonly></textarea>
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

    </form>

    <script>
        document.getElementById('muridSelect')
            .addEventListener('change', function() {

                let selectedOption =
                    this.options[this.selectedIndex];

                let mapel =
                    selectedOption.getAttribute('data-mapel');

                let alamat =
                    selectedOption.getAttribute('data-alamat');

                // isi mapel otomatis
                document.getElementById('mapelInput').value = mapel;

                // isi alamat otomatis
                document.getElementById('alamatInput').value = alamat;

                // filter guru
                let guruSelect =
                    document.getElementById('guruSelect');

                let guruOptions = guruSelect.options;

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
