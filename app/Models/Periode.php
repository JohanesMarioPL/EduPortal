<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $table = "periode_pengajuan";
    protected $primaryKey = "periode_id";
    protected $keyType = "bigInteger";
    public $incrementing = false;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "periode_id",
        'nama_periode',
        'tanggal_mulai',
        'tanggal_berakhir',
        'fakultas_id',
    ];

    // Periode.php
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'fakultas_id');
    }

}
