<?php

namespace App\Http\Controllers;

<<<<<<< Updated upstream
use App\Models\Pengajuan;
=======
<<<<<<< HEAD
use App\Models\Beasiswa;
use App\Models\Pengajuan;
use App\Models\Periode;
=======
use App\Models\Pengajuan;
>>>>>>> b6d254c1496bb6668fab03c0f76b46de9858a988
>>>>>>> Stashed changes
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
<<<<<<< Updated upstream
        $pengajuan = Pengajuan::paginate(5);
        return view('user.pengajuan', ['pengajuan' => $pengajuan]);
=======
<<<<<<< HEAD
        $getPeriode = Periode::all();
        $jenisBeasiswa = Beasiswa::all();
        $periodes = Periode::all();
        return view('user.pengajuan', compact('getPeriode', 'jenisBeasiswa', 'periodes'));
    }

    public function store(Request $request)
    {
        $pengajuan = new Pengajuan();
        $pengajuan->nrp = $request->input('nrp');
        $pengajuan->jenis_beasiswa_id = $request->input('jenis_beasiswa_id');
        $pengajuan->periode_id = $request->input('periode_id');
        $pengajuan->tanggal_pengajuan = $request->input('tanggal_pengajuan');
        $pengajuan->IPK = $request->input('IPK');
        $pengajuan->portofolio = $request->input('portofolio');
        $pengajuan->dokumenPKM = $request->file('dokumenPKM')->store('dokumen');
        $pengajuan->dokumenTidakMenerimaBeasiswaLain = $request->file('dokumenTidakMenerimaBeasiswaLain')->store('dokumen');
        $pengajuan->dokumenSertifikat = $request->file('dokumenSertifikat')->store('dokumen');
        $pengajuan->dokumenSKTM = $request->file('dokumenSKTM')->store('dokumen');
        $pengajuan->dokumenTagihanListrik = $request->file('dokumenTagihanListrik')->store('dokumen');

        $pengajuan->save();

        return redirect()->route('user.pengajuan')->with('success', 'Pengajuan berhasil diajukan');
=======
        $pengajuan = Pengajuan::paginate(5);
        return view('user.pengajuan', ['pengajuan' => $pengajuan]);
>>>>>>> b6d254c1496bb6668fab03c0f76b46de9858a988
>>>>>>> Stashed changes
    }

    public function show($id)
    {
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
        $pengajuan = Pengajuan::where('periode_id', $id)->first();
        return response()->json($pengajuan);
=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======
>>>>>>> b6d254c1496bb6668fab03c0f76b46de9858a988
>>>>>>> Stashed changes
    }
}
