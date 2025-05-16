<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pencatatan;

class PencatatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pencatatan::create([
            "tanggal" => "2025-05-06",
            "nama" => "Singkong",
            "jenis" => "Stok Masuk",
            "jumlah" => "1000 Kg",
            "harga" => 500000,
            "supplier" => "Petani Giantangan",
            "tujuan" => "-",
            "keterangan" => "Pembelian untuk produksi tanggal 8 Mei 2025"
        ]);
        
        Pencatatan::create([
            "tanggal" => "2025-05-08",
            "nama" => "Singkong",
            "jenis" => "Stok Keluar",
            "jumlah" => "500 Kg",
            "tujuan" => "Produksi batch 7",
            "keterangan" => "Tidak ada keterangan"
        ]);

        Pencatatan::create([
            "tanggal" => "2025-05-08",
            "nama" => "Gula Merah",
            "jenis" => "Stok Keluar",
            "jumlah" => "5 Kg",
            "tujuan" => "Produksi batch 7",
            "keterangan" => "Digunakan untuk varian rasa coklat"
        ]);
    }
}
