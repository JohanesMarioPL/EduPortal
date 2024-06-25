<?php
namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Beasiswa;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::with(['beasiswa', 'periode'])->paginate(5);
        $beasiswas = Beasiswa::all();
        $periodes = Periode::all();
        return view('user.pengajuan', [
            'pengajuan' => $pengajuan,
            'beasiswas' => $beasiswas,
            'periodes' => $periodes,
        ]);
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::with(['beasiswa', 'periode'])->findOrFail($id);

        if (request()->ajax()) {
            return response()->json($pengajuan);
        }

        return view('user.pengajuan.show', ['pengajuan' => $pengajuan]);
    }

    public function showUser($id)
    {
        $pengajuan = Pengajuan::with(['beasiswa', 'periode'])->findOrFail($id);
        return response()->json($pengajuan);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nrp' => 'required|string|max:255',
            'jenis_beasiswa_id' => 'required|integer',
            'periode_id' => 'required|integer',
            'tanggal_pengajuan' => 'required|date',
            'IPK' => 'required|numeric',
            'portofolio' => 'required|numeric',
            'dokumenPKM' => 'required|file',
            'dokumenTidakMenerimaBeasiswaLain' => 'required|file',
            'dokumenSertifikat' => 'required|file',
            'dokumenSKTM' => 'required|file',
            'dokumenTagihanListrik' => 'required|file',
        ]);

        $data = $request->only('nrp', 'jenis_beasiswa_id', 'periode_id', 'tanggal_pengajuan', 'IPK', 'portofolio');
        $data['status_pengajuan'] = 'diajukan';

        // Save file names in the database and upload files
        $data['dokumenPKM'] = $request->file('dokumenPKM')->store('dokumenPKM');
        $data['dokumenTidakMenerimaBeasiswaLain'] = $request->file('dokumenTidakMenerimaBeasiswaLain')->store('dokumenTidakMenerimaBeasiswaLain');
        $data['dokumenSertifikat'] = $request->file('dokumenSertifikat')->store('dokumenSertifikat');
        $data['dokumenSKTM'] = $request->file('dokumenSKTM')->store('dokumenSKTM');
        $data['dokumenTagihanListrik'] = $request->file('dokumenTagihanListrik')->store('dokumenTagihanListrik');

        Pengajuan::create($data);

        return redirect()->route('user.pengajuan')->with('success', 'Data pengajuan berhasil ditambahkan.');
    }

    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|string|in:approved,declined',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);

        if ($request->status == 'declined') {
            DB::transaction(function () use ($pengajuan) {
                $pengajuan->delete();
            });
        } else {
            $pengajuan->status_pengajuan = $request->status;
            DB::transaction(function () use ($pengajuan) {
                $pengajuan->save();
            });
        }

        return response()->json(['success' => true]);
    }
}

