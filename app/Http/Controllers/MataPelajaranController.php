<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mapel = MataPelajaran::all();

        return view('admin.mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('admin.mapel.create');
    }

    public function store(Request $request)
    {
        MataPelajaran::create($request->all());

        return redirect()->route('mata-pelajaran.index');
    }

    public function edit($id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        return view('admin.mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $mapel->update($request->all());

        return redirect()->route('mata-pelajaran.index');
    }

    public function destroy($id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $mapel->delete();

        return redirect()->route('mata-pelajaran.index');
    }
}
