@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        Edit Jadwal
    </h1>

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Guru</label>
            <select name="guru_id" class="form-control">

                @foreach ($guru as $g)
                    <option value="{{ $g->id }}" {{ $jadwal->guru_id == $g->id ? 'selected' : '' }}>
                        {{ $g->nama }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Murid</label>
            <select name="murid_id" class="form-control">

                @foreach ($murid as $m)
                    <option value="{{ $m->id }}" {{ $jadwal->murid_id == $m->id ? 'selected' : '' }}>
                        {{ $m->nama_murid }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Mata Pelajaran</label>

            <select name="mata_pelajaran" class="form-control">
                @foreach ($mapel as $m)
                    <option value="{{ $m->nama_mapel }}" {{ $jadwal->mata_pelajaran == $m->nama_mapel ? 'selected' : '' }}>

                        {{ $m->nama_mapel }}

                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Hari</label>

            <select name="hari" class="form-control">
                <option {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>
                    Senin
                </option>

                <option {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>
                    Selasa
                </option>

                <option {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>
                    Rabu
                </option>

                <option {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>
                    Kamis
                </option>

                <option {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>
                    Jumat
                </option>

                <option {{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>
                    Sabtu
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jam</label>
            <input type="time" name="jam" value="{{ $jadwal->jam }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $jadwal->alamat }}</textarea>
        </div>

        <button class="btn btn-primary">
            Update
        </button>

    </form>
@endsection
