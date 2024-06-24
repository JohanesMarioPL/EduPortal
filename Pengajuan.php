<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = "pengajuan_beasiswa";
    protected $primaryKey = "pengajuan_id";
    protected $keyType = "bigInteger";
    public $incrementing = false;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "pengajuan_id",
        'jenis_beasiswa_id',
        'nrp',
        'periode_id',
        'tanggal_pengajuan',
        'status_pengajuan',
        "IPK",
        'portofolio',
        'dokumenPKM',
        'dokumenTidakMenerimaBeasiswaLain',
        'dokumenSertifikat',
        'dokumenSKTM',
        'dokumenTagihanListrik',
    ];

    // Definisikan relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'nrp', 'nrp');
    }

    // Definisikan relasi ke model Beasiswa
    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'jenis_beasiswa_id', 'jenis_beasiswa_id');
    }

    // Definisikan relasi ke model Periode
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'periode_id');
    }
}
