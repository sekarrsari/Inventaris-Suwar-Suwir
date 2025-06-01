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
        Schema::create('pencatatans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama');
            // $table->enum('jenis', ['Stok Masuk', 'Stok Keluar']);
            $table->integer('jumlah');
            $table->enum('satuan', ['Kg', 'Btl'])
                ->default('Kg');
            $table->decimal('hargaSatuan', 15, 0);
            $table->decimal('totalHarga', 15, 0);
            $table->string('supplier');
            $table->string('bulan');
            $table->enum('musim', ['Hujan', 'Kemarau'])
                ->default('Hujan');
            
            // $table->string('tujuan')
            //     ->nullable();        // hanya untuk keluar
            // $table->text('keterangan')
            //     ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencatatans');
    }
};
