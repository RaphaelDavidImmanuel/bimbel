@extends('layouts.guru')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-graduate text-primary"></i>
        <b> Data Murid Saya</b>
    </h1>

    <div class="card shadow mb-4">

        {{-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">
                Daftar Murid
            </h6>
        </div> --}}

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Nama Murid</th>
                            <th>Orang Tua</th>
                            <th>No HP</th>
                            <th>Mata Pelajaran</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($murids as $murid)
                            <tr>
                                <td>
                                    <i class="fas fa-user-graduate text-primary"></i>
                                    {{ $murid->nama_murid }}
                                </td>

                                <td>
                                    <i class="fas fa-users text-primary"></i>
                                    {{ $murid->nama_orangtua }}
                                </td>

                                <td>
                                    <i class="fas fa-phone text-info"></i>
                                    {{ $murid->no_hp }}
                                </td>

                                <td>
                                    <span class="badge badge-info px-3 py-2">
                                        {{ $murid->mata_pelajaran }}
                                    </span>
                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <i class="fas fa-user-slash fa-2x text-secondary mb-2"></i>
                                    <br>
                                    Belum ada murid
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
