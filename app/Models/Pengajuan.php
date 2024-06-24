<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pengajuan_beasiswa';

    // Primary Key
    protected $primaryKey = 'pengajuan_id';

    // Kolom yang dapat diisi
    protected $fillable = [
        'jenis_beasiswa_id',
        'periode_id',
        'tanggal_pengajuan',
        'status_pengajuan',
        'IPK',
        'portofolio',
        'dokumenPKM',
        'dokumenTidakMenerimaBeasiswaLain',
        'dokumenSertifikat',
        'dokumenSKTM',
        'dokumenTagihanListrik',
    ];

    // Timestamp kolom created_at dan updated_at
    public $timestamps = true;

    // Menentukan tipe data untuk kolom tertentu
    protected $casts = [
        'tanggal_pengajuan' => 'date',
        'status_pengajuan' => 'string',
        'IPK' => 'float',
        'portofolio' => 'integer',
    ];
}
