<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Penting untuk manipulasi data
use App\Models\Manajemen;        // Jika Anda ingin menggunakan Eloquent untuk update (opsional)
use App\Models\Supplier;          // Jika Anda ingin menggunakan Eloquent untuk lookup (opsional)
use Illuminate\Support\Facades\Log; // Untuk logging jika diperlukan


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Tambahkan kolom supplier_id (nullable pada awalnya untuk data yang sudah ada)
        Schema::table('manajemens', function (Blueprint $table) {
            $table->unsignedBigInteger('supplier_id')
                ->nullable() // Penting agar tidak error pada data lama sebelum diisi
                ->after('status'); // Sesuaikan 'status' dengan nama kolom sebelumnya jika ingin mengatur posisi
        });

        // 2. Migrasikan data dari kolom 'supplier' (string) ke 'supplier_id' (integer)
        // Menggunakan Eloquent (lebih mudah dibaca)
        $manajemens = Manajemen::whereNotNull('supplier')->where('supplier', '!=', '')->get();
        foreach ($manajemens as $manajemen) {
            $supplierModel = Supplier::where('namaSupplier', $manajemen->supplier)->first();
            if ($supplierModel) {
                $manajemen->supplier_id = $supplierModel->id;
                $manajemen->save(); // Hati-hati jika ada observer/event pada model Manajemen saat save
            } else {
                // Opsional: Catat jika nama supplier lama tidak ditemukan di tabel suppliers
                Log::warning("Supplier name '{$manajemen->supplier}' not found for Manajemen ID {$manajemen->id}");
            }
        }

        // Alternatif menggunakan DB Facade (kadang lebih aman dalam migrasi kompleks)
        // DB::table('manajemens')->whereNotNull('supplier')->where('supplier', '!=', '')->orderBy('id')->chunk(100, function ($manajemensChunk) {
        //     foreach ($manajemensChunk as $manajemen) {
        //         $supplierData = DB::table('suppliers')->where('namaSupplier', $manajemen->supplier)->first(['id']);
        //         if ($supplierData) {
        //             DB::table('manajemens')->where('id', $manajemen->id)->update(['supplier_id' => $supplierData->id]);
        //         } else {
        //             // Log::warning("Supplier '{$manajemen->supplier}' not found for Manajemen ID {$manajemen->id}");
        //         }
        //     }
        // });


        // 3. (Opsional tapi direkomendasikan) Tambahkan Foreign Key Constraint setelah data dimigrasikan
        //    Ini lebih aman dilakukan setelah supplier_id diisi, terutama jika ada data yang tidak valid.
        //    Jika Anda ingin kolom supplier_id tidak nullable, Anda perlu update kolomnya dulu.
        //    Contoh: DB::table('manajemens')->whereNull('supplier_id')->update(['supplier_id' => ID_SUPPLIER_DEFAULT_JIKA_ADA]);
        //    Schema::table('manajemens', function (Blueprint $table) {
        //        $table->unsignedBigInteger('supplier_id')->nullable(false)->change(); // Jika ingin jadi not nullable
        //    });

        Schema::table('manajemens', function (Blueprint $table) {
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('set null'); // Atau 'restrict'. Pastikan 'supplier_id' nullable untuk 'set null'.
        });

        // 4. Hapus kolom 'supplier' yang lama (string)
        Schema::table('manajemens', function (Blueprint $table) {
            $table->dropColumn('supplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Tambahkan kembali kolom 'supplier' (string)
        Schema::table('manajemens', function (Blueprint $table) {
            $table->string('supplier')->nullable()->after('status'); // Sesuaikan posisi
        });

        // 2. (Opsional) Coba isi kembali data ke kolom 'supplier' dari 'supplier_id'
        // Ini lebih kompleks karena perlu join dan mungkin tidak semua data bisa dikembalikan sempurna.
        // $manajemens = Manajemen::whereNotNull('supplier_id')->with('supplier')->get();
        // foreach ($manajemens as $manajemen) {
        //     if ($manajemen->supplier) {
        //         $manajemen->supplier = $manajemen->supplier->namaSupplier;
        //         $manajemen->save();
        //     }
        // }

        // 3. Hapus Foreign Key
        Schema::table('manajemens', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
        });

        // 4. Hapus kolom 'supplier_id'
        Schema::table('manajemens', function (Blueprint $table) {
            $table->dropColumn('supplier_id');
        });
    }
};
