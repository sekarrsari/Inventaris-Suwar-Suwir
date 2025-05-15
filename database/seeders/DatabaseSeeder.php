<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Manajemen;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Manajemen::create([
            "kode" => "BB01",
            "nama" => "Singkong",
            "jenis" => "Bahan utama",
            "satuan" => "Kg",
            "supplier" => "Petani Giantangan",
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
            "supplier" => "Pedagang Mangli",
            "tanggalBeli" => "2025-05-06",
            "harga" => 12000,
            "stokMinimum" => 50,
            "status" => "Tersedia"
        ]);

        Manajemen::create([
            "kode" => "BB03",
            "nama" => "Perasa Makanan",
            "jenis" => "Tambahan",
            "satuan" => "Liter",
            "supplier" => "Toko R&W",
            "tanggalBeli" => "2025-05-06",
            "harga" => 25000,
            "stokMinimum" => 10,
            "status" => "Hampir habis"
        ]);
    }
}
