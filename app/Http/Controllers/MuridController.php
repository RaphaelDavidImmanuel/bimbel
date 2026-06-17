<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function index()
    {
        $murid = Murid::all();

        return view('admin.murid.index', compact('murid'));
    }

    public function create()
    {
        $mapel = MataPelajaran::all();

        return view('admin.murid.create', compact('mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_murid' => [
                'required',
                'regex:/^[A-Za-z\s]+$/'
            ],

            'nama_orangtua' => [
                'required',
                'regex:/^[A-Za-z\s]+$/'
            ],

            'no_hp' => [
                'required',
                'numeric'
            ],

            'alamat' => [
                'required'
            ],

            'mata_pelajaran' => [
                'required'
            ]

        ], [
            'nama_murid.required' => 'Nama murid wajib diisi',
            'nama_murid.regex' => 'Nama murid hanya boleh huruf',

            'nama_orangtua.required' => 'Nama orang tua wajib diisi',
            'nama_orangtua.regex' => 'Nama orang tua hanya boleh huruf',

            'no_hp.required' => 'No HP wajib diisi',
            'no_hp.numeric' => 'No HP hanya boleh angka',

            'alamat.required' => 'Alamat wajib diisi',

            'mata_pelajaran.required' => 'Mata pelajaran wajib dipilih'

        ]);

        Murid::create([
            'nama_murid' => $request->nama_murid,
            'nama_orangtua' => $request->nama_orangtua,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'mata_pelajaran' => $request->mata_pelajaran
        ]);

        return redirect()->route('murid.index')->with('success', 'Data murid telah berhasil ditambahkan');
    }

    // public function store(Request $request)
    // {
    //     Murid::create($request->all());
    //     return redirect()->route('murid.index')->with('success', 'Data murid telah berhasil ditambahkan');
    // }

    public function edit($id)
    {
        $murid = Murid::findOrFail($id);

        $mapel = MataPelajaran::all();

        return view('admin.murid.edit', compact('murid', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $murid = Murid::findOrFail($id);

        $request->validate([

            'nama_murid' => [
                'required',
                'regex:/^[A-Za-z\s]+$/'
            ],

            'nama_orangtua' => [
                'required',
                'regex:/^[A-Za-z\s]+$/'
            ],

            'no_hp' => [
                'required',
                'numeric'
            ],

            'alamat' => [
            '   required'
            ],

            'mata_pelajaran' => [
                'required'
            ]

        ], [

            'nama_murid.regex' => 'Nama murid hanya boleh huruf',
            'nama_orangtua.regex' => 'Nama orang tua hanya boleh huruf',
            'no_hp.numeric' => 'No HP hanya boleh angka'

        ]);

        $murid->update([
            'nama_murid' => $request->nama_murid,
            'nama_orangtua' => $request->nama_orangtua,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'mata_pelajaran' => $request->mata_pelajaran
        ]);

        return redirect()->route('murid.index')->with('success', 'Data murid berhasil diubah');
    }

    // public function update(Request $request, $id)
    // {
    //     $murid = Murid::findOrFail($id);

    //     $murid->update($request->all());

    //     return redirect()->route('murid.index')->with('success', 'Data murid berhasil diubah');
    // }

    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);

        $murid->delete();

        return redirect()->route('murid.index')->with('delete', 'Data murid berhasil dihapus');
    }
}
