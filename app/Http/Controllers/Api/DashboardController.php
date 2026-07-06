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
        //----------------------------------
        // Ambil Guru Login
        //----------------------------------

        $guru = Guru::where('user_id', $request->user()->id)->first();

        if (!$guru) {
            return response()->json([
                "success" => false,
                "message" => "Data guru tidak ditemukan."
            ], 404);
        }

        //----------------------------------
        // Statistik
        //----------------------------------

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

        //----------------------------------
        // Progress
        //----------------------------------

        $progress = 0;

        if ($totalJadwal > 0) {
            $progress = round(($selesai / $totalJadwal) * 100);
        }

        //----------------------------------
        // Jadwal Hari Ini
        //----------------------------------

        $hariIni = now()->locale('id')->translatedFormat('l');

        $jadwalHariIni = Jadwal::with('murid')
            ->where('guru_id', $guru->id)
            ->where('hari', $hariIni)
            ->orderBy('jam')
            ->get()
            ->map(function ($jadwal) {

                return [
                    "id" => $jadwal->id,
                    "murid" => optional($jadwal->murid)->nama,
                    "mata_pelajaran" => $jadwal->mata_pelajaran,
                    "jam" => $jadwal->jam,
                    "alamat" => $jadwal->alamat,
                    "status" => ucfirst($jadwal->status_mengajar),
                ];

            })
            ->values();

        //----------------------------------
        // Jadwal Berikutnya
        //----------------------------------

        $jadwalBerikutnya = Jadwal::with('murid')
            ->where('guru_id', $guru->id)
            ->where('status_mengajar', 'belum')
            ->orderBy('hari')
            ->orderBy('jam')
            ->first();

        //----------------------------------
        // Response
        //----------------------------------

        return response()->json([

            "success" => true,

            "data" => [

                //----------------------------------
                // Guru
                //----------------------------------

                "guru" => [

                    "id" => $guru->id,
                    "nama" => $guru->nama,
                    "email" => $guru->email,
                    "mata_pelajaran" => $guru->mata_pelajaran,

                ],

                //----------------------------------
                // Statistik
                //----------------------------------

                "statistik" => [

                    "total_jadwal" => $totalJadwal,
                    "belum_mulai" => $belumMulai,
                    "sedang_mengajar" => $sedangMengajar,
                    "selesai" => $selesai,
                    "laporan" => $laporan,
                    "progress" => $progress,

                ],

                //----------------------------------
                // Jadwal Berikutnya
                //----------------------------------

                "jadwal_berikutnya" => $jadwalBerikutnya ? [

                    "id" => $jadwalBerikutnya->id,
                    "murid" => optional($jadwalBerikutnya->murid)->nama,
                    "mata_pelajaran" => $jadwalBerikutnya->mata_pelajaran,
                    "jam" => $jadwalBerikutnya->jam,
                    "alamat" => $jadwalBerikutnya->alamat,
                    "status" => ucfirst($jadwalBerikutnya->status_mengajar),

                ] : null,

                //----------------------------------
                // Jadwal Hari Ini
                //----------------------------------

                "jadwal_hari_ini" => $jadwalHariIni,

            ]

        ]);
    }
}
