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
        Schema::create('pelamars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_posisi')->constrained('posisis')->cascadeOnDelete();
            $table->string('nama_pelamar');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_telp')->nullable();
            $table->string('kota_domisili')->nullable();
            $table->string('pengalaman_kerja')->nullable();
            $table->text('keterangan_pengalaman')->nullable();
            $table->string('file_upload')->nullable();
            $table->string('nomer_peserta')->nullable();
            $table->enum('status_pelamar', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamars');
    }
};
