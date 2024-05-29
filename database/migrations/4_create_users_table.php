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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username', 50);
            $table->string('password');
            $table->unsignedBigInteger('role_id');
            $table->string('nama', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->unsignedBigInteger('fakultas_id')->nullable();
            $table->unsignedBigInteger('program_studi_id')->nullable();
            $table->timestamps();

            $table->foreign('fakultas_id')->references('fakultas_id')->on('fakultas')->onDelete('set null');
            $table->foreign('program_studi_id')->references('program_studi_id')->on('program_studi')->onDelete('set null');
            $table->foreign('role_id')->references('role_id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
