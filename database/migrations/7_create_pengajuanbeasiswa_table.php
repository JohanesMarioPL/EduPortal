<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_beasiswa', function (Blueprint $table) {
            $table->id('pengajuan_id');
            $table->unsignedBigInteger('jenis_beasiswa_id');
            $table->unsignedBigInteger('periode_id');
            $table->date('tanggal_pengajuan');
            $table->enum('status_pengajuan', ['diajukan', 'disetujui_program_studi', 'disetujui_fakultas', 'ditolak_program_studi', 'ditolak_fakultas']);
            $table->timestamps();
            $table->foreign('jenis_beasiswa_id')->references('jenis_beasiswa_id')->on('jenis_beasiswa')->onDelete('cascade');
            $table->foreign('periode_id')->references('periode_id')->on('periode_pengajuan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuanbeasiswa');
    }
};
