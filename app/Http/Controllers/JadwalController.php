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
        $request->validate([
            'guru_id' => 'required',
            'murid_id' => 'required',
            'mata_pelajaran' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'alamat' => 'required'

        ], [

            'guru_id.required' => 'Guru wajib dipilih',
            'murid_id.required' => 'Murid wajib dipilih',
            'mata_pelajaran.required' => 'Mata pelajaran wajib dipilih',
            'hari.required' => 'Hari wajib dipilih',
            'jam.required' => 'Jam wajib diisi',
            'alamat.required' => 'Alamat wajib diisi'

        ]);

        // CEK JADWAL BENTROK
        $cekJadwal = Jadwal::where('guru_id', $request->guru_id)->where('hari', $request->hari)->where('jam', $request->jam)->exists();

            if ($cekJadwal) {

            return redirect()->back()->withInput()->with('error','Jadwal tidak bisa dibuat, karena guru sudah memiliki jadwal pada hari dan jam tersebut, mohon mengubah hari atau jam yaa');
            }

            $data = $request->only([
                'guru_id',
                'murid_id',
                'mata_pelajaran',
                'hari',
                'jam',
                'alamat'
            ]);

            $data['status_notif'] = 0;
            Jadwal::create($data);

            return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $guru = Guru::select('id', 'nama', 'mata_pelajaran')->get();
        $murid = Murid::all();
        // $mapel = MataPelajaran::all();

        return view('admin.jadwal.edit', compact('jadwal', 'guru', 'murid'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $request->validate([
            'guru_id' => 'required',
            'murid_id' => 'required',
            'mata_pelajaran' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'alamat' => 'required'

        ]);

        $jadwal->update($request->only([
            'guru_id',
            'murid_id',
            'mata_pelajaran',
            'hari',
            'jam',
            'alamat'
        ]));

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diubah');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('delete', 'Jadwal berhasil dihapus');
    }
}
