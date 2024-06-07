<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $table = 'jenis_beasiswa';

    protected $primaryKey = 'jenis_beasiswa_id';

    protected $fillable = [
        'nama_jenis_beasiswa',
    ];

}
