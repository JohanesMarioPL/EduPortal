<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function getProdi(Prodi $prodi)
    {
//        $getRole = Role::select(['role_id', 'nama_role'])->get();
//        $getProdi = Prodi::select(['program_studi_id', 'nama_program_studi'])->get();
        $fakultas = Fakultas::select(['fakultas_id', 'nama_fakultas'])->get();
        $prodi = Prodi::select(['program_studi_id','nama_program_studi', 'fakultas_id'])->get();
        return Response()->view('admin.program-studi', ['prodi' => $prodi, 'fakultas' => $fakultas]);
    }
}
