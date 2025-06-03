<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            "namaSupplier" => "Petani Glantangan",
            "bahan" => "Singkong",
            "tanggal" => "2013-08-20",
            "telepon" => "089696822681",
            "alamat" => "Jalan Glantangan, Jember",
            "status" => "Aktif"
        ]);

        Supplier::create([
            "namaSupplier" => "Pedagang Pasar Mangli",
            "bahan" => "Gula Merah",
            "tanggal" => "2015-06-05",
            "telepon" => "082140476296",
            "alamat" => "Pasar Mangli, Jember",
            "status" => "Aktif"
        ]);

        Supplier::create([
            "namaSupplier" => "R & W",
            "bahan" => "Perasa Makanan",
            "tanggal" => "2015-07-10",
            "telepon" => "085156875912",
            "alamat" => "Jalan Mangli, Jember",
            "status" => "Aktif"
        ]);
    }
}
