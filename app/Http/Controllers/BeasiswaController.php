<?php
namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function getBeasiswa()
    {
        $beasiswa = Beasiswa::select(['jenis_beasiswa_id', 'nama_jenis_beasiswa'])->paginate(5);
        return view('admin.beasiswa', ['beasiswa' => $beasiswa]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_beasiswa_id' => 'required|string|max:255',
            'nama_jenis_beasiswa' => 'required|string|max:255',
        ]);

        Beasiswa::create($request->only('jenis_beasiswa_id', 'nama_jenis_beasiswa'));

        return redirect()->route('admin.beasiswa')->with('success', 'Data beasiswa berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis_beasiswa' => 'required|string|max:255',
        ]);

        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->update($request->only('nama_jenis_beasiswa'));

        return redirect()->route('admin.beasiswa')->with('success', 'Data beasiswa berhasil diperbarui.');
    }

    public function destroy($jenis_beasiswa_id)
    {
        $beasiswa = Beasiswa::findOrFail($jenis_beasiswa_id);
        $beasiswa->delete();
        return redirect()->route('admin.beasiswa')->with('success', 'Data beasiswa berhasil dihapus.');
    }
}
