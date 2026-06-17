<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();

        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        $mapel = MataPelajaran::all();
        return view('admin.guru.create', compact('mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => [
                'required',
                'regex:/^[A-Za-z\s]+$/'
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email'
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

            ],

            [
                'nama.required' => 'Nama wajib diisi',
                'nama.regex' => 'Nama hanya boleh huruf',

                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah digunakan',

                'no_hp.required' => 'No HP wajib diisi',
                'no_hp.numeric' => 'No HP hanya boleh angka',

                'alamat.required' => 'Alamat wajib diisi',
                'mata_pelajaran.required' => 'Mata pelajaran wajib dipilih'

        ]);

        // buat akun login guru
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'role' => 'guru'
        ]);

        // simpan data guru
        Guru::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'mata_pelajaran' => $request->mata_pelajaran
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $mapel = MataPelajaran::all();

        return view('admin.guru.edit', compact('guru', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        $request->validate([

            'nama' => [
                'required',
                'regex:/^[A-Za-z\s]+$/'
            ],
            'email' => [
                'required',
                'email'
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
            'nama.required' => 'Nama wajib diisi',
            'nama.regex' => 'Nama hanya boleh huruf',

            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',

            'no_hp.required' => 'No HP wajib diisi',
            'no_hp.numeric' => 'No HP hanya boleh angka',

            'alamat.required' => 'Alamat wajib diisi',

            'mata_pelajaran.required' => 'Mata pelajaran wajib dipilih'

        ]);

        $guru->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'mata_pelajaran' => $request->mata_pelajaran
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diubah');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        $guru->delete();

        return redirect()->route('guru.index')->with('delete', 'Data guru berhasil dihapus');
    }
}
