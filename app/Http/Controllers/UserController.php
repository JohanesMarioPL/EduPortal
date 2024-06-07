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
        $users = User::select(['nrp', 'username', 'password', 'role_id', 'nama', 'email', 'fakultas_id', 'program_studi_id'])->get();
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

        return redirect()->route('admin.users.index')->with('success', 'User added successfully.');
    }
}
