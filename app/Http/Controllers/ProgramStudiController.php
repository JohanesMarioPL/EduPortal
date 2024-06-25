<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Periode;
use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function pengajuan()
    {
        // Mengambil semua data pengajuan
        $pengajuans = Pengajuan::all();
        return view('program-studi.pengajuan', compact('pengajuans'));
    }

    public function riwayat()
    {
        // Mengambil semua data periode
        $periodes = Periode::all();
        return view('program-studi.riwayat', compact('periodes'));
    }

    public function showPengajuanByPeriode($periode_id)
    {
        // Mengambil data pengajuan berdasarkan periode_id
        $pengajuans = Pengajuan::where('periode_id', $periode_id)->get();
        return view('program-studi.pengajuan_periode', compact('pengajuans', 'periode_id'));
    }

    public function approvePengajuan(Request $request, $id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($pengajuan) {
            $status = $request->input('status_pengajuan');
            if (in_array($status, ['disetujui_program_studi', 'ditolak_program_studi'])) {
                $pengajuan->status_pengajuan = $status;
                $pengajuan->save();
                return response()->json(['success' => true]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Pengajuan not found or invalid status']);
    }
    public function store(Request $request)
    {
        $request->validate([
            'program_studi_id' => 'required|string|max:10|unique:program_studi',
            'nama_program_studi' => 'required|string|max:255',
            'fakultas_id' => 'required|exists:fakultas,fakultas_id',
        ]);

        Prodi::create([
            'program_studi_id' => $request->program_studi_id,
            'nama_program_studi' => $request->nama_program_studi,
            'fakultas_id' => $request->fakultas_id,
        ]);

        return redirect()->route('admin.program-studi')->with('success', 'Data program studi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_program_studi' => 'required|string|max:255',
            'fakultas_id' => 'required|exists:fakultas,fakultas_id',
        ]);

        $programStudi = Prodi::findOrFail($id);
        $programStudi->update([
            'nama_program_studi' => $request->nama_program_studi,
            'fakultas_id' => $request->fakultas_id,
        ]);

        return redirect()->route('admin.program-studi')->with('success', 'Data program studi berhasil diperbarui.');
    }



    public function destroy($id)
    {
        $programStudi = Prodi::findOrFail($id);
        $programStudi->delete();

        return redirect()->route('admin.program-studi')->with('success', 'Data program studi berhasil dihapus.');
    }

public function getProdi()
    {
        $prodi = Prodi::with('fakultas')->paginate(5);
        $fakultas = Fakultas::all();
        return view('admin.program-studi', ['prodi' => $prodi, 'fakultas' => $fakultas]);
    }
}

