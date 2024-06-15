<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function getProdi()
    {
        $prodi = Prodi::with('fakultas')->paginate(5);
        $fakultas = Fakultas::all();
        return response()->view('admin.program-studi', ['prodi' => $prodi, 'fakultas' => $fakultas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_studi_id' => 'required|unique:program_studi,program_studi_id',
            'nama_program_studi' => 'required|string|max:255',
            'fakultas_id' => 'required|exists:fakultas,fakultas_id',
        ]);

        Prodi::create($request->only('program_studi_id', 'nama_program_studi', 'fakultas_id'));

        return redirect()->route('admin-prodi')->with('success', 'Program Studi berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_program_studi' => 'required|string|max:255',
            'fakultas_id' => 'required|exists:fakultas,fakultas_id',
        ]);

        $prodi = Prodi::findOrFail($id);
        $prodi->update($request->only('nama_program_studi', 'fakultas_id'));

        return redirect()->route('admin-prodi')->with('success', 'Program Studi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        return redirect()->route('admin-prodi')->with('success', 'Program Studi berhasil dihapus');
    }
}
