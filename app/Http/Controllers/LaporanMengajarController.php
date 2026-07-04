<?php

namespace App\Http\Controllers;

use App\Models\LaporanMengajar;

class LaporanMengajarController extends Controller
{
    public function index()
    {
        $laporans = LaporanMengajar::with([
            'guru:id,nama',
            'murid:id,nama_murid',
            'jadwal:id,mata_pelajaran'
        ])->latest()->paginate(10);

        return view('admin.laporan.index', compact('laporans'));
    }

    public function show($id)
    {
        $laporan = LaporanMengajar::with([
            'guru:id,nama,no_hp,email',
            'murid:id,nama_murid,nama_orangtua,no_hp,alamat',
            'jadwal:id,mata_pelajaran,hari,jam'
        ])->findOrFail($id);

        return view('admin.laporan.show', compact('laporan'));
    }
}