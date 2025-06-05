<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Manajemen;
use App\Models\Supplier;

class ManajemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ambil ID supplier berdasarkan nama.
        // Pastikan data supplier ini sudah ada di tabel 'suppliers'
        // (misalnya, melalui SupplierSeeder yang dijalankan sebelumnya)

        $petaniGlantangan = Supplier::where('namaSupplier', 'Petani Glantangan')->first();
        $pedagangMangli = Supplier::where('namaSupplier', 'Pedagang Pasar Mangli')->first();
        $tokoRW = Supplier::where('namaSupplier', 'R & W')->first();
        // Anda bisa menambahkan supplier lain yang dibutuhkan di sini

        // Lakukan error handling jika supplier tidak ditemukan, contoh:
        if (!$petaniGlantangan) {
            $this->command->error("Supplier 'Petani Glantangan' tidak ditemukan. Pastikan SupplierSeeder sudah dijalankan dan data ada.");
            // Anda bisa memilih untuk menghentikan seeder atau menggunakan nilai default/null
            // return; // Menghentikan seeder jika supplier krusial tidak ada
        }
        if (!$pedagangMangli) {
            $this->command->error("Supplier 'Pedagang Pasar Mangli' tidak ditemukan.");
            // return;
        }
        if (!$tokoRW) {
            $this->command->error("Supplier 'R & W' tidak ditemukan.");
            // return;
        }


        Manajemen::create([
            "kode" => "BB01",
            "nama" => "Singkong",
            "jenis" => "Bahan utama",
            "satuan" => "Kg",
            // Ganti "supplier" dengan "supplier_id" dan gunakan ID yang didapatkan
            "supplier_id" => $petaniGlantangan ? $petaniGlantangan->id : null,
            "tanggalBeli" => "2025-05-06",
            "harga" => 5000,
            "stokMinimum" => 100,
            "status" => "Tersedia"
        ]);

        Manajemen::create([
            "kode" => "BB02",
            "nama" => "Gula Merah",
            "jenis" => "Bahan utama",
            "satuan" => "Kg",
            "supplier_id" => $pedagangMangli ? $pedagangMangli->id : null,
            "tanggalBeli" => "2025-05-06",
            "harga" => 12000,
            "stokMinimum" => 50,
            "status" => "Tersedia"
        ]);

        Manajemen::create([
            "kode" => "BB03",
            "nama" => "Perasa Makanan",
            "jenis" => "Tambahan",
            "satuan" => "Btl",
            "supplier_id" => $tokoRW ? $tokoRW->id : null,
            "tanggalBeli" => "2025-05-06",
            "harga" => 25000,
            "stokMinimum" => 10,
            "status" => "Hampir habis"
        ]);

        // Anda bisa menambahkan data bahan baku lainnya di sini
        // Contoh jika supplier "Hibou" juga ada:
        // $hibou = Supplier::where('namaSupplier', 'Hibou')->first();
        // Manajemen::create([
        //     "kode" => "BB04",
        //     "nama" => "Mentega", // Contoh
        //     "jenis" => "Tambahan",
        //     "satuan" => "Kg",
        //     "supplier_id" => $hibou ? $hibou->id : null,
        //     "tanggalBeli" => "2025-05-06",
        //     "harga" => 30000,
        //     "stokMinimum" => 5,
        //     "status" => "Tersedia"
        // ]);
        
        $this->command->info('ManajemenSeeder berhasil dijalankan.');
    

        // Manajemen::create([
        //     "kode" => "BB01",
        //     "nama" => "Singkong",
        //     "jenis" => "Bahan utama",
        //     "satuan" => "Kg",
        //     "supplier" => "Petani Glantangan",
        //     "tanggalBeli" => "2025-05-06",
        //     "harga" => 5000,
        //     "stokMinimum" => 100,
        //     "status" => "Tersedia"
        // ]);

        // Manajemen::create([
        //     "kode" => "BB02",
        //     "nama" => "Gula Merah",
        //     "jenis" => "Bahan utama",
        //     "satuan" => "Kg",
        //     "supplier" => "Pedagang Mangli",
        //     "tanggalBeli" => "2025-05-06",
        //     "harga" => 12000,
        //     "stokMinimum" => 50,
        //     "status" => "Tersedia"
        // ]);

        // Manajemen::create([
        //     "kode" => "BB03",
        //     "nama" => "Perasa Makanan",
        //     "jenis" => "Tambahan",
        //     "satuan" => "Btl",
        //     "supplier" => "Toko R&W",
        //     "tanggalBeli" => "2025-05-06",
        //     "harga" => 25000,
        //     "stokMinimum" => 10,
        //     "status" => "Hampir habis"
        // ]);

    }
}
