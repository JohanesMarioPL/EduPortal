<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(User $users)
    {
        $getRole = Role::select(['role_id', 'nama_role'])->get();
        $getProdi = Prodi::select(['program_studi_id', 'nama_program_studi'])->get();
        $getFakultas = Fakultas::select(['fakultas_id', 'nama_fakultas'])->get();
        $users = User::select(['nrp', 'username', 'password', 'role_id', 'nama', 'email', 'fakultas_id', 'program_studi_id'])->paginate(5);
        return response()->view('admin.user', ['users' => $users, 'getRole' => $getRole, 'getProdi' => $getProdi, 'getFakultas' => $getFakultas]);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'nrp' => 'required|unique:users,nrp',
            'username' => 'required|unique:users,username',
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'program_studi' => 'required',
            'fakultas' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'nrp' => $request->nrp,
            'username' => $request->username,
            'password' => bcrypt($request->nrp),
            'role_id' => $request->role,
            'nama' => $request->nama,
            'email' => $request->email,
            'fakultas_id' => $request->fakultas,
            'program_studi_id' => $request->program_studi,
        ]);

        return redirect()->route('admin-users')->with('success', 'User berhasil ditambahkan');
    }

    public function destroy($nrp)
    {
        $user = User::where('nrp', $nrp)->firstOrFail();
        $user->delete();

        return redirect()->route('admin-users')->with('success', 'User berhasil dihapus');
    }

    public function update(Request $request, $nrp)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $nrp . ',nrp',
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $nrp . ',nrp',
            'program_studi' => 'required',
            'fakultas' => 'required',
            'role' => 'required',
        ]);

        $user = User::where('nrp', $nrp)->firstOrFail();
        $user->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'program_studi_id' => $request->program_studi,
            'fakultas_id' => $request->fakultas,
            'role_id' => $request->role,
        ]);

        return redirect()->route('admin-users')->with('success', 'User berhasil diperbarui');
    }


}
