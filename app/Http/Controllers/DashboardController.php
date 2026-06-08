<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Murid;
use App\Models\MataPelajaran;
use Carbon\Carbon;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard', [
            'totalGuru' => Guru::count(),
            'totalMurid' => Murid::count(),
            'totalMapel' => MataPelajaran::count(),
            'totalJadwal' => Jadwal::count()
        ]);
    }

    public function guru()
    {
        $guru = Guru::where('user_id', auth()->id())->first();
        $totalJadwal = Jadwal::where('guru_id', $guru->id)->count();
        $totalMurid = Jadwal::where('guru_id', $guru->id)->distinct('murid_id')->count('murid_id');

        $hariIni = Carbon::now()->locale('id')->translatedFormat('l');
        $jadwalHariIni = Jadwal::with('murid')->where('guru_id', $guru->id)->where('hari', $hariIni)->get();

        return view('guru.dashboard', compact(
            'guru',
            'totalJadwal',
            'totalMurid',
            'hariIni',
            'jadwalHariIni'
        ));
    }

    // public function jadwalGuru()
    // {
    //     dd('masuk');
    // }

    public function jadwalGuru()
    {
        $guru = Guru::where('user_id', auth()->id())->first();
        $jadwals = Jadwal::with('murid')->where('guru_id', $guru->id)->orderBy('hari')->get();

        return view('guru.jadwal', compact('jadwals', 'guru'));
    }

    public function muridGuru()
    {
        $guru = Guru::where('user_id', auth()->id())->first();
        $murids = Murid::whereHas('jadwal', function ($query) use ($guru) {
            $query->where('guru_id', $guru->id);
        })->get();

        return view('guru.murid', compact('murids'));
    }
}
