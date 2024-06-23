<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::paginate(5);
        return view('user.pengajuan', ['pengajuan' => $pengajuan]);
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('user.pengajuan.show', ['pengajuan' => $pengajuan]);
    }

    public function store(Request $request)
    {
        $request->validate([
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

        $data = $request->only('jenis_beasiswa_id', 'periode_id', 'tanggal_pengajuan', 'IPK', 'portofolio');
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
}
