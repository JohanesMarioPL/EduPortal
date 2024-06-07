<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function getFakultas(Fakultas $fakultas)
    {
//        $getRole = Role::select(['role_id', 'nama_role'])->get();
//        $getProdi = Prodi::select(['program_studi_id', 'nama_program_studi'])->get();
//        $getFakultas = Fakultas::select(['fakultas_id', 'nama_fakultas'])->get();
        $fakultas = Fakultas::select(['fakultas_id','nama_fakultas'])->get();
        return Response()->view('admin.fakultas', ['fakultas' => $fakultas]);
    }
}
