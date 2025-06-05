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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->enum('bulan', ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
            $table->year('tahun');
            $table->integer('jumlah_ori');
            $table->integer('jumlah_rasa');
            $table->timestamps();

            // Opsional tapi sangat direkomendasikan:
            // Tambahkan unique constraint agar tidak ada entri duplikat untuk bulan dan tahun yang sama.
            $table->unique(['bulan', 'tahun']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
