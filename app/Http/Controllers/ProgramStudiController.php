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
}

