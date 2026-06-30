<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $guru = $request->user();

        $jadwal = Jadwal::select(
                'id',
                'guru_id',
                'murid_id',
                'mata_pelajaran',
                'hari',
                'jam',
                'alamat',
                'status_notif',
                'status_mengajar'
            )
            ->with([
                'murid:id,nama_murid,nama_orangtua,no_hp,alamat,mata_pelajaran'
            ])
            ->where('guru_id', $guru->guru->id)
            ->orderBy('hari')
            ->orderBy('jam')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Jadwal berhasil diambil',
            'data' => $jadwal
        ]);
    }
}
