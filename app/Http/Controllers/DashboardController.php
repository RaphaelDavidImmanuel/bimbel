<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Murid;
use App\Models\MataPelajaran;
use App\Models\Jadwal;
use Carbon\Carbon;

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

        $notifJadwal = Jadwal::with('murid')->where('guru_id', $guru->id)->where('status_notif', 0)->get();

        Jadwal::where('guru_id', $guru->id)->where('status_notif', 0)->update([
            'status_notif' => 1
        ]);

        return view('guru.dashboard', compact(
            'guru',
            'totalJadwal',
            'totalMurid',
            'hariIni',
            'jadwalHariIni',
            'notifJadwal'
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
