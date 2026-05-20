<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Murid;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $mapel = MataPelajaran::all();

        return view('landing', compact('mapel'));
    }

    public function daftar(Request $request)
    {
        Murid::create([

            'nama_murid' => $request->nama_murid,
            'nama_orang_tua' => $request->nama_orang_tua,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'mata_pelajaran' => $request->mata_pelajaran
        ]);

        return redirect('/')->with('success', 'Pendaftaran berhasil');
    }
}
