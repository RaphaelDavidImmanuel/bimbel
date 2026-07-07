<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\LaporanMengajar;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $guru = Guru::where('user_id', $request->user()->id)->first();

        if (!$guru) {
            return response()->json([
                "success" => false,
                "message" => "Data guru tidak ditemukan."
            ], 404);
        }

        $totalJadwal = Jadwal::where('guru_id', $guru->id)->count();

        $totalMurid = Jadwal::where('guru_id', $guru->id)
            ->distinct('murid_id')
            ->count('murid_id');

        $totalLaporan = LaporanMengajar::where('guru_id', $guru->id)->count();

        return response()->json([
            "success" => true,
            "message" => "Profil guru berhasil diambil.",
            "data" => [

                "id" => $guru->id,
                "nama" => $guru->nama,
                "email" => $guru->email,
                "no_hp" => $guru->no_hp,
                "alamat" => $guru->alamat,
                "mata_pelajaran" => $guru->mata_pelajaran,
                "created_at" => $guru->created_at,

                "statistik" => [
                    "jadwal" => $totalJadwal,
                    "murid" => $totalMurid,
                    "laporan" => $totalLaporan,
                ]
            ]
        ]);
    }
}
