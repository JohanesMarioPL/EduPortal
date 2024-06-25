<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Periode;
use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
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

    public function pengajuan()
    {
        // Mengambil semua data pengajuan yang belum di-approve
        $pengajuans = Pengajuan::where('status_pengajuan', '!=', 'disetujui_program_studi')->get();
        return view('program-studi.pengajuan', compact('pengajuans'));
    }

    public function riwayat()
    {
        $periodes = Periode::all();
        return view('program-studi.riwayat', compact('periodes'));
    }


    public function showRiwayatByPeriode($periode_id)
    {
        $pengajuans = Pengajuan::with(['user.prodi', 'beasiswa'])
            ->where('periode_id', $periode_id)
            ->get();
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
            return response()->json(['success' => false, 'message' => 'Invalid status']);
        }

        return response()->json(['success' => false, 'message' => 'Pengajuan not found']);
    }
}

