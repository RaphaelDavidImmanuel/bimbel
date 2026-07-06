<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\LaporanMengajar;

class DashboardController extends Controller
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

        $belumMulai = Jadwal::where('guru_id', $guru->id)
            ->where('status_mengajar', 'belum')
            ->count();

        $sedangMengajar = Jadwal::where('guru_id', $guru->id)
            ->where('status_mengajar', 'sedang')
            ->count();

        $selesai = Jadwal::where('guru_id', $guru->id)
            ->where('status_mengajar', 'selesai')
            ->count();

        $laporan = LaporanMengajar::where('guru_id', $guru->id)->count();

        return response()->json([
            "success" => true,
            "data" => [
                "guru" => [
                    "id" => $guru->id,
                    "nama" => $guru->nama,
                    "email" => $guru->email,
                    "mata_pelajaran" => $guru->mata_pelajaran,
                ],

                "statistik" => [
                    "total_jadwal" => $totalJadwal,
                    "belum_mulai" => $belumMulai,
                    "sedang_mengajar" => $sedangMengajar,
                    "selesai" => $selesai,
                    "laporan" => $laporan,
                ]
            ]
        ]);
    }
}
