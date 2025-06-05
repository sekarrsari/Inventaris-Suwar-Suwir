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
        Schema::create('manajemens', function (Blueprint $table) {
            $table->id();
            $table->string('kode')
                ->unique();
            $table->string('nama');
            $table->enum('jenis', ['Bahan utama', 'Tambahan'])
                ->default('Bahan utama');
            $table->enum('satuan', ['Kg', 'Btl'])
                ->default("Kg");
            $table->string('supplier');
            $table->date('tanggalBeli');
            $table->decimal('harga', 12, 0);
            $table->integer('stokMinimum');
            $table->integer('stok_aktual');
            $table->enum('status', ['Tersedia', 'Hampir habis', 'Habis'])
                ->default('Tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajemens');
    }
};
