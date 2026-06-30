<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Murid;

class MuridController extends Controller
{
    public function show($id)
    {
        $murid = Murid::select(
            'id',
            'nama_murid',
            'nama_orangtua',
            'no_hp',
            'alamat',
            'mata_pelajaran'
        )->find($id);

        if (!$murid) {
            return response()->json([
                'success' => false,
                'message' => 'Data murid tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail murid berhasil diambil',
            'data' => $murid
        ]);
    }
}
