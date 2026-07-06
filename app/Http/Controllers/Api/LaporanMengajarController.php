<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\LaporanMengajar;

class LaporanMengajarController extends Controller
{
    /**
     * Riwayat laporan mengajar guru
     */
    public function index(Request $request)
    {
        $guru = $request->user()->guru;

        $laporan = LaporanMengajar::with([
            'murid:id,nama_murid',
            'jadwal:id,hari,jam,mata_pelajaran'
        ])
        ->where('guru_id', $guru->id)
        ->latest()
        ->get();

        // Rapikan response
        $laporan->makeHidden([
            'created_at',
            'updated_at',
            'guru_id',
            'murid_id',
            'jadwal_id'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Riwayat laporan berhasil diambil.',
            'data' => $laporan
        ]);
    }

    /**
     * Simpan laporan mengajar
     */
    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id'   => 'required|exists:jadwals,id',
            'jam_mulai'   => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'materi'      => 'required|string',
            'catatan'     => 'nullable|string',
        ]);

        $guru = $request->user()->guru;

        $jadwal = Jadwal::find($request->jadwal_id);

        // Jadwal tidak ditemukan
        if (!$jadwal) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal tidak ditemukan.'
            ], 404);
        }

        // Jadwal bukan milik guru yang login
        if ($jadwal->guru_id != $guru->id) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki akses ke jadwal ini.'
            ], 403);
        }

        // Guru harus menekan tombol Mulai Mengajar terlebih dahulu
        if ($jadwal->status_mengajar != 'Sedang Mengajar') {
            return response()->json([
                'success' => false,
                'message' => 'Silakan mulai mengajar terlebih dahulu.'
            ], 400);
        }

        // Cegah laporan ganda
        if ($jadwal->laporanMengajar) {
            return response()->json([
                'success' => false,
                'message' => 'Laporan untuk jadwal ini sudah pernah dibuat.'
            ], 400);
        }

        // Simpan laporan
        $laporan = LaporanMengajar::create([
            'jadwal_id'   => $jadwal->id,
            'guru_id'     => $guru->id,
            'murid_id'    => $jadwal->murid_id,
            'tanggal'     => now()->toDateString(),
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'materi'      => $request->materi,
            'catatan'     => $request->catatan,
            'status'      => 'Selesai'
        ]);

        // Update status jadwal menjadi selesai
        $jadwal->update([
            'status_mengajar' => 'Selesai'
        ]);

        // Rapikan response
        $laporan->makeHidden([
            'created_at',
            'updated_at',
            'guru_id',
            'murid_id'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Laporan berhasil disimpan.',
            'data' => $laporan
        ], 201);
    }
}
