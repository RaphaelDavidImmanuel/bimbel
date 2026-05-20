<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Murid;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();

        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $guru = Guru::select('id', 'nama', 'mata_pelajaran')->get();

        $murid = Murid::all();
        $mapel = MataPelajaran::all();

        return view('admin.jadwal.create', compact('guru', 'murid', 'mapel'));
    }

    public function store(Request $request)
    {
        Jadwal::create($request->all());

        return redirect()->route('jadwal.index');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $guru = Guru::select('id', 'nama', 'mata_pelajaran')->get();
        $murid = Murid::all();
        $mapel = MataPelajaran::all();

        return view('admin.jadwal.edit', compact('jadwal', 'guru', 'murid', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()->route('jadwal.index');
    }
}
