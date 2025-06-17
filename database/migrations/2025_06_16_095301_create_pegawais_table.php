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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            // Foreign key untuk akun login pegawai (terhubung ke tabel users)
            // onDelete('cascade') berarti jika data user dihapus, data pegawai ini juga ikut terhapus.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Foreign key untuk mitra yang membuat data pegawai ini (juga terhubung ke tabel users)
            $table->foreignId('mitra_id')->constrained('users')->onDelete('cascade');
            
            $table->string('nama_lengkap');
            // $table->string('posisi');
            $table->string('nomor_telepon')->nullable();
            $table->text('alamat')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
