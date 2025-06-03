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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('namaSupplier');
            $table->string('bahan');
            $table->date('tanggal');
            $table->string('telepon');
            $table->text('alamat');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Dalam Peninjauan'])
                ->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
