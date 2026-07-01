<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class StatusMengajarController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'status_mengajar' => 'required|in:Belum Mengajar,Sedang Mengajar,Selesai'
        ]);

        $jadwal = Jadwal::find($id);

        if (!$jadwal) {

            return response()->json([
                'success' => false,
                'message' => 'Jadwal tidak ditemukan'
            ],404);

        }

        $jadwal->update([
            'status_mengajar' => $request->status_mengajar
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status mengajar berhasil diperbarui',
            'data' => $jadwal
        ]);
    }
}
