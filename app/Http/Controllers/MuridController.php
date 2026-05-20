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
        Murid::create($request->all());

        return redirect()->route('murid.index')->with('success', 'Data murid telah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $murid = Murid::findOrFail($id);

        $mapel = MataPelajaran::all();

        return view('admin.murid.edit', compact('murid', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $murid = Murid::findOrFail($id);

        $murid->update($request->all());

        return redirect()->route('murid.index')->with('success', 'Data murid berhasil diubah');
    }

    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);

        $murid->delete();

        return redirect()->route('murid.index')->with('success', 'Data murid berhasil dihapus');
    }
}
