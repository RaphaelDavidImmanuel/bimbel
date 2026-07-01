<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Murid;

class MuridController extends Controller
{
    /**
     * Detail murid
     */
    public function show(Request $request, $id)
    {
        $guru = $request->user()->guru;

        $murid = Murid::select(
                'id',
                'nama_murid',
                'nama_orangtua',
                'no_hp',
                'alamat',
                'mata_pelajaran'
            )
            ->whereHas('jadwal', function ($query) use ($guru) {
                $query->where('guru_id', $guru->id);
            })
            ->find($id);

        if (!$murid) {
            return response()->json([
                'success' => false,
                'message' => 'Data murid tidak ditemukan atau tidak memiliki akses.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail murid berhasil diambil.',
            'data' => $murid
        ]);
    }
}
