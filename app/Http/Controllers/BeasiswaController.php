<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function getBeasiswa(Beasiswa $beasiswa)
    {
        $beasiswa = Beasiswa::select(['jenis_beasiswa_id','nama_jenis_beasiswa'])->get();
        return Response()->view('admin.beasiswa', ['beasiswa' => $beasiswa]);
    }
}
