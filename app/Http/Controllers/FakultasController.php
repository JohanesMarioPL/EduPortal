<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Periode;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\User;
use App\Models\Beasiswa;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FakultasController extends Controller
{
    public function riwayat()
    {
        // Mengambil semua data periode
        $periodes = Periode::all();

        // Mengirim data periode ke view
        return view('fakultas.riwayat', compact('periodes'));
    }

    // Method untuk menampilkan status pengajuan berdasarkan periode
    public function showStatusByPeriode($periode_id)
    {
        // Mengambil data pengajuan berdasarkan periode_id
        $pengajuans = Pengajuan::where('periode_id', $periode_id)->get();

        // Mengirim data pengajuan dan periode_id ke view
        return view('fakultas.status', compact('pengajuans', 'periode_id'));
    }

    // Method untuk memperbarui status pengajuan
    public function updateStatus(Request $request, $id)
    {
        // Mencari pengajuan berdasarkan ID
        $pengajuan = Pengajuan::find($id);

        if ($pengajuan) {
            // Mengambil status dari request
            $status = $request->input('status_pengajuan');

            // Mengupdate status pengajuan
            $pengajuan->status_pengajuan = $status;
            $pengajuan->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Pengajuan not found']);
    }

    public function getFakultas()
    {
        $fakultas = Fakultas::select(['fakultas_id', 'nama_fakultas'])->paginate(5);
        return response()->view('admin.fakultas', ['fakultas' => $fakultas]);
    }

    public function periodeFakultas()
    {
        $fakultas = Fakultas::select(['fakultas_id', 'nama_fakultas'])->get(); // Menambahkan get() untuk mengambil data
        $periode = Periode::select(['periode_id','nama_periode', 'tanggal_mulai', 'tanggal_berakhir', 'fakultas_id'])->paginate(5);
        return response()->view('fakultas.periode', ['fakultas' => $fakultas, 'periode' => $periode]);
    }

    public function mahasiswaFakultas(User $users)
    {
        $getPeriode = Periode::select(['periode_id', 'nama_periode', 'fakultas_id'])->get();
        return response()->view('fakultas.mahasiswa', ['getPeriode' => $getPeriode]);
    }

    public function mahasiswaFakultasPeriode(User $users, Request $request)
    {
        $getRole = Role::select(['role_id', 'nama_role'])->get();
        $getProdi = Prodi::select(['program_studi_id', 'nama_program_studi'])->get();
        $getFakultas = Fakultas::select(['fakultas_id', 'nama_fakultas'])->get();
        $getPeriode = Periode::select(['periode_id', 'nama_periode'])->get();
        $users = User::where('fakultas_id', 1)
            ->select(['nrp', 'username', 'password', 'role_id', 'nama', 'email', 'fakultas_id', 'program_studi_id'])
            ->paginate(5);
        $getPengajuan = Pengajuan::select(["pengajuan_id", 'jenis_beasiswa_id', 'nrp', 'periode_id', 'tanggal_pengajuan', 'status_pengajuan', "IPK", 'portofolio', 'dokumenPKM', 'dokumenTidakMenerimaBeasiswaLain', 'dokumenSertifikat', 'dokumenSKTM', 'dokumenTagihanListrik'])->get();
        $periode_id = $request->route('periode_id');
        $getBeasiswa = Beasiswa::select('jenis_beasiswa_id', 'nama_jenis_beasiswa')->get();
        return response()->view('fakultas.perperiode', [ 'getBeasiswa'=>$getBeasiswa, 'periode_id' => $periode_id,'users' => $users, 'getProdi' => $getProdi, 'getRole' => $getRole, 'getFakultas' => $getFakultas, 'getPengajuan' => $getPengajuan, 'getPeriode' => $getPeriode]);
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

    public function storePeriode(Request $request)
    {
        $request->validate([
            'periode_id' => 'required',
            'nama_periode' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_berakhir' => 'required',
            'fakultas_id' => 'required',
        ]);

        Periode::create($request->only('periode_id', 'nama_periode', 'tanggal_mulai', 'tanggal_berakhir', 'fakultas_id'));

        return redirect()->route('fakultas.periode')->with('success', 'Periode berhasil ditambahkan');
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

    public function updatePeriode(Request $request, $id)
    {
        $request->validate([
            'periode_id' => 'required',
            'nama_periode' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_berakhir' => 'required',
            'fakultas_id' => 'required',
        ]);

        $periode = Periode::findOrFail($id);
        $periode->update($request->only('periode_id', 'nama_periode', 'tanggal_mulai', 'tanggal_berakhir', 'fakultas_id'));

        return redirect()->route('fakultas.periode')->with('success', 'Periode   berhasil diperbarui');
    }

    public function mahasiswaFakultasPeriodeHasil(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'pengajuan_id' => 'required', // sesuaikan dengan aturan validasi yang dibutuhkan
            'jenis_beasiswa_id' => 'required',
            'nrp' => 'required',
            'periode_id' => 'required',
            'tanggal_pengajuan' => 'required',
            'status_pengajuan' => 'required',
            'IPK' => 'required',
            'portofolio' => 'required',
        ]);
        $periode_id = $request->periode_id;
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update($request->only('pengajuan_id', 'jenis_beasiswa_id', 'nrp', 'periode_id', 'tanggal_pengajuan' , 'status_pengajuan', 'IPK', 'portofolio'));

        return redirect()->route('fakultas.perperiode', $periode_id)->with('success', 'Periode   berhasil diperbarui');
    }

    public function destroy($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();

        return redirect()->route('admin-fakultas')->with('success', 'Fakultas berhasil dihapus');
    }

    public function destroyPeriode($id)
    {
        $periode = Periode::findOrFail($id);
        $periode->delete();

        return redirect()->route('fakultas.periode')->with('success', 'Periode berhasil dihapus');
    }
}

