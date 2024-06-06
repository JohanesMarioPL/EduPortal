<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers(User $users)
    {
        $getRole = Role::select(['role_id', 'nama_role'])->get();
        $getProdi = Prodi::select(['program_studi_id', 'nama_program_studi'])->get();
        $getFakultas = Fakultas::select(['fakultas_id', 'nama_fakultas'])->get();
        $users = User::select(['nrp','username', 'password', 'role_id', 'nama', 'email', 'fakultas_id', 'program_studi_id'])->get();
        return Response()->view('admin.user', ['users' => $users, 'getRole' => $getRole, 'getProdi' => $getProdi, 'getFakultas' => $getFakultas]);
    }
}
