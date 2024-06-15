<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function getFakultas()
    {
        $fakultas = Fakultas::select(['fakultas_id', 'nama_fakultas'])->paginate(5);
        return response()->view('admin.fakultas', ['fakultas' => $fakultas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fakultas_id' => 'required|unique:fakultas,fakultas_id',
            'nama_fakultas' => 'required|string|max:255',
        ]);

        Fakultas::create($request->only('fakultas_id', 'nama_fakultas'));

        return redirect()->route('admin-fakultas')->with('success', 'Fakultas berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fakultas' => 'required|string|max:255',
        ]);

        $fakultas = Fakultas::findOrFail($id);
        $fakultas->update($request->only('nama_fakultas'));

        return redirect()->route('admin-fakultas')->with('success', 'Fakultas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();

        return redirect()->route('admin-fakultas')->with('success', 'Fakultas berhasil dihapus');
    }
}

