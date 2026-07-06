<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    /**
     * Daftar jadwal guru
     */
    public function index(Request $request)
    {
        $guru = $request->user()->guru;

        $jadwal = Jadwal::select(
                'id',
                'mata_pelajaran',
                'hari',
                'jam',
                'alamat',
                'status_mengajar'
            )
            ->with([
                'murid:id,nama_murid,nama_orangtua,no_hp,alamat,mata_pelajaran'
            ])
            ->where('guru_id', $guru->id)
            ->orderBy('hari')
            ->orderBy('jam')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Jadwal berhasil diambil.',
            'data' => $jadwal
        ]);
    }

    /**
     * Mulai mengajar
     */
    public function mulaiMengajar(Request $request, $id)
    {
        $guru = $request->user()->guru;

        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal tidak ditemukan.'
            ],404);
        }

        if ($jadwal->guru_id != $guru->id) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki akses ke jadwal ini.'
            ],403);
        }

        $jadwal->update([
            'status_mengajar' => 'Sedang Mengajar'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Mengajar dimulai.',
            'data' => [
                'id' => $jadwal->id,
                'status_mengajar' => $jadwal->status_mengajar
            ]
        ]);
    }

    /**
     * Selesai mengajar
     */
    public function selesaiMengajar(Request $request, $id)
    {
        $guru = $request->user()->guru;

        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal tidak ditemukan.'
            ],404);
        }

        if ($jadwal->guru_id != $guru->id) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki akses ke jadwal ini.'
            ],403);
        }

        $jadwal->update([
            'status_mengajar' => 'Selesai'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Mengajar selesai.',
            'data' => [
                'id' => $jadwal->id,
                'status_mengajar' => $jadwal->status_mengajar
            ]
        ]);
    }
}
