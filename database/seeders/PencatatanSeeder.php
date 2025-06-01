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
      $dataPencatatan = [
        
        // 2023
        ["tanggal" => "2023-01-01", "nama" => "Singkong", "jumlah" => 5100, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 81600000, "supplier" => "Petani Glantangan", "bulan" => "1", "musim" => "Hujan"],
        ["tanggal" => "2023-01-01", "nama" => "Gula Merah", "jumlah" => 50, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 900000, "supplier" => "Pedagang Pasar Mangli", "bulan" => "1", "musim" => "Hujan"],
        ["tanggal" => "2023-01-01", "nama" => "Perasa Makanan", "jumlah" => 40, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 240000, "supplier" => "R & W", "bulan" => "1", "musim" => "Hujan"],

        ["tanggal" => "2023-02-01", "nama" => "Singkong", "jumlah" => 5000, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 80000000, "supplier" => "Petani Glantangan", "bulan" => "2", "musim" => "Hujan"],
        ["tanggal" => "2023-02-01", "nama" => "Gula Merah", "jumlah" => 33, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 594000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 2, "Musim" => "Hujan"],
        ["tanggal" => "2023-02-01", "nama" => "Perasa Makanan", "jumlah" => 42, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 252000, "supplier" => "R&W", "bulan" => 2, "musim" => "Hujan"],

        ["tanggal" => "2023-03-01", "nama" => "Singkong", "jumlah" => 5250, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 84000000, "supplier" => "Petani Glantangan", "bulan" => 3, "musim" => "Hujan"],
        ["tanggal" => "2023-03-01", "nama" => "Gula Merah", "jumlah" => 50, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 900000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 3,"musim" => "Hujan"],
        ["tanggal" => "2023-03-01", "nama" => "Perasa Makanan", "jumlah" => 40, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 240000, "supplier" => "R&W", "bulan" => 3, "musim" => "Hujan"],

        ["tanggal" => "2023-04-01", "nama" => "Singkong", "jumlah" => 4700, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 75200000, "supplier" => "Petani Glantangan", "bulan" => 4, "musim" => "Kemarau"],
        ["tanggal" => "2023-04-01", "nama" => "Gula Merah", "jumlah" => 20, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 360000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 4,"musim" => "Kemarau"],
        ["tanggal" => "2023-04-01", "nama" => "Perasa Makanan", "jumlah" => 34, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 204000, "supplier" => "R&W", "bulan" => 4, "musim" => "Kemarau"],

        ["tanggal" => "2023-05-01", "nama" => "Singkong", "jumlah" => 5000, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 80000000, "supplier" => "Petani Glantangan", "bulan" => 5, "musim" => "Kemarau"],
        ["tanggal" => "2023-05-01", "nama" => "Gula Merah", "jumlah" => 40, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 720000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 5, "musim" => "Kemarau"],
        ["tanggal" => "2023-05-01", "nama" => "Perasa Makanan", "jumlah" => 30, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 180000, "supplier" => "R&W", "bulan" => 5, "musim" => "Kemarau"],
        
        ["tanggal" => "2023-06-01", "nama" => "Singkong", "jumlah" => 4800, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 76800000, "supplier" => "Petani Glantangan", "bulan" => 6, "musim" => "Kemarau"],
        ["tanggal" => "2023-06-01", "nama" => "Gula Merah", "jumlah" => 35, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 630000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 6, "musim" => "Kemarau"],
        ["tanggal" => "2023-06-01", "nama" => "Perasa Makanan", "jumlah" => 25, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 150000, "supplier" => "R&W", "bulan" => 6, "musim" => "Kemarau"],

        ["tanggal" => "2023-07-01", "nama" => "Singkong", "jumlah" => 5000, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 80000000, "supplier" => "Petani Glantangan", "bulan" => 7, "musim" => "Kemarau"],
        ["tanggal" => "2023-07-01", "nama" => "Gula Merah", "jumlah" => 35, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 630000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 7, "musim" => "Kemarau"],
        ["tanggal" => "2023-07-01", "nama" => "Perasa Makanan", "jumlah" => 55, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 330000, "supplier" => "R&W", "bulan" => 7, "musim" => "Kemarau"],

        ["tanggal" => "2023-08-01", "nama" => "Singkong", "jumlah" => 5800, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 92800000, "supplier" => "Petani Glantangan", "bulan" => 8, "musim" => "Kemarau"],
        ["tanggal" => "2023-08-01", "nama" => "Gula Merah", "jumlah" => 30, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 540000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 8, "musim" => "Kemarau"],
        ["tanggal" => "2023-08-01", "nama" => "Perasa Makanan", "jumlah" => 40, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 240000, "supplier" => "R&W", "bulan" => 8, "musim" => "Kemarau"],

        ["tanggal" => "2023-09-01", "nama" => "Singkong", "jumlah" => 6000, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 96000000, "supplier" => "Petani Glantangan", "bulan" => 9, "musim" => "Kemarau"],
        ["tanggal" => "2023-09-01", "nama" => "Gula Merah", "jumlah" => 40, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 720000,"supplier" => "Pedagang Pasar Mangli", "bulan" => 9,"musim" => "Kemarau"],
        ["tanggal" => "2023-09-01", "nama" => "Perasa Makanan", "jumlah" => 35, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 210000,"supplier" => "R&W", "bulan" => 9, "musim" => "Kemarau"],

        ["tanggal" => "2023-10-01", "nama" => "Singkong", "jumlah" => 5200, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 83200000,"supplier" => "Petani Glantangan", "bulan" => 10, "musim" => "Hujan"],
        ["tanggal" => "2023-10-01", "nama" => "Gula Merah", "jumlah" => 40, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 720000,"supplier" => "Pedagang Pasar Mangli", "bulan" => 10, "musim" => "Hujan"],
        ["tanggal" => "2023-10-01", "nama" => "Perasa Makanan", "jumlah" => 20, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 120000,"supplier" => "R&W", "bulan" => 10, "musim" => "Hujan"],

        ["tanggal" => "2023-11-01", "nama" => "Singkong", "jumlah" => 5300, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 84800000, "supplier" => "Petani Glantangan", "bulan" => 11, "musim" => "Hujan"],
        ["tanggal" => "2023-11-01", "nama" => "Gula Merah", "jumlah" => 40, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 720000,"supplier" => "Pedagang Pasar Mangli", "bulan" => 11, "musim" => "Hujan"],
        ["tanggal" => "2023-11-01", "nama" => "Perasa Makanan", "jumlah" => 35, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 210000, "supplier" => "R&W", "bulan" => 11, "musim" => "Hujan"],

        ["tanggal" => "2023-12-01", "nama" => "Singkong", "jumlah" => 5550, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 88800000, "supplier" => "Petani Glantangan", "bulan" => 12, "musim" => "Hujan"],
        ["tanggal" => "2023-12-01", "nama" => "Gula Merah", "jumlah" => 60, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 1080000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 12, "musim" => "Hujan"],
        ["tanggal" => "2023-12-01", "nama" => "Perasa Makanan", "jumlah" => 45, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 270000, "supplier" => "R&W", "bulan" => 12, "musim" => "Hujan"],

        
        // 2024
        ["tanggal" => "2024-01-01", "nama" => "Singkong", "jumlah" => 5500, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 88000000, "supplier" => "Petani Glantangan", "bulan" => 1,"musim" => "Hujan"],
        ["tanggal" => "2024-01-01", "nama" => "Gula Merah", "jumlah" => 60, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 1080000,"supplier" => "Pedagang Pasar Mangli", "bulan" => 1,"musim" => "Hujan"],
        ["tanggal" => "2024-01-01", "nama" => "Perasa Makanan", "jumlah" => 45, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 270000, "supplier" => "R&W", "bulan" => 1, "musim" => "Hujan"],

        ["tanggal" => "2024-02-01", "nama" => "Singkong", "jumlah" => 4900, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 78400000, "supplier" => "Petani Glantangan", "bulan" => 2, "musim" => "Hujan"],
        ["tanggal" => "2024-02-01", "nama" => "Gula Merah", "jumlah" => 45, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 810000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 2, "musim" => "Hujan"],
        ["tanggal" => "2024-02-01", "nama" => "Perasa Makanan", "jumlah" => 30, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 180000, "supplier" => "R&W", "bulan" => 2,"musim" => "Hujan"],

        ["tanggal" => "2024-03-01", "nama" => "Singkong", "jumlah" => 5000, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 80000000, "supplier" => "Petani Glantangan", "bulan" => 3, "musim" => "Hujan"],
        ["tanggal" => "2024-03-01", "nama" => "Gula Merah", "jumlah" => 55, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 990000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 3, "musim" => "Hujan"],
        ["tanggal" => "2024-03-01", "nama" => "Perasa Makanan", "jumlah" => 48, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 288000, "supplier" => "R&W", "bulan" => 3, "musim" => "Hujan"],

        ["tanggal" => "2024-04-01", "nama" => "Singkong", "jumlah" => 5300, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 84800000, "supplier" => "Petani Glantangan", "bulan" => 4, "musim" => "Kemarau"],
        ["tanggal" => "2024-04-01", "nama" => "Gula Merah", "jumlah" => 68, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 1224000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 4, "musim" => "Kemarau"],
        ["tanggal" => "2024-04-01", "nama" => "Perasa Makanan", "jumlah" => 30, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 180000,"supplier" => "R&W", "bulan" => 4, "musim" => "Kemarau"],
        
        ["tanggal" => "2024-05-01", "nama" => "Singkong", "jumlah" => 5100, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 81600000, "supplier" => "Petani Glantangan", "bulan" => 5, "musim" => "Kemarau"],
        ["tanggal" => "2024-05-01", "nama" => "Gula Merah", "jumlah" => 65, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 1170000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 5, "musim" => "Kemarau"],
        ["tanggal" => "2024-05-01", "nama" => "Perasa Makanan", "jumlah" => 40, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 240000, "supplier" => "R&W", "bulan" => 5, "musim" => "Kemarau"],

        ["tanggal" => "2024-06-01", "nama" => "Singkong", "jumlah" => 6000, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 96000000, "supplier" => "Petani Glantangan", "bulan" => 6, "musim" => "Kemarau"],
        ["tanggal" => "2024-06-01", "nama" => "Gula Merah", "jumlah" => 50, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 900000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 6, "musim" => "Kemarau"],
        ["tanggal" => "2024-06-01", "nama" => "Perasa Makanan", "jumlah" => 45, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 270000,"supplier" => "R&W", "bulan" => 6,"musim" => "Kemarau"],

        ["tanggal" => "2024-07-01", "nama" => "Singkong", "jumlah" => 5500, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 88000000, "supplier" => "Petani Glantangan", "bulan" => 7, "musim" => "Kemarau"],
        ["tanggal" => "2024-07-01", "nama" => "Gula Merah", "jumlah" => 30, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 540000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 7, "musim" => "Kemarau"],
        ["tanggal" => "2024-07-01", "nama" => "Perasa Makanan", "jumlah" => 58, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 348000, "supplier" => "R&W", "bulan" => 7, "musim" => "Kemarau"],

        ["tanggal" => "2024-08-01", "nama" => "Singkong", "jumlah" => 5600, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 89600000, "supplier" => "Petani Glantangan", "bulan" => 8, "musim" => "Kemarau"],
        ["tanggal" => "2024-08-01", "nama" => "Gula Merah", "jumlah" => 70, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 1260000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 8, "musim" => "Kemarau"],
        ["tanggal" => "2024-08-01", "nama" => "Perasa Makanan", "jumlah" => 56, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 336000, "supplier" => "R&W", "bulan" => 8, "musim" => "Kemarau"],

        ["tanggal" => "2024-09-01", "nama" => "Singkong", "jumlah" => 5300, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 84800000, "supplier" => "Petani Glantangan", "bulan" => 9, "musim" => "Kemarau"],
        ["tanggal" => "2024-09-01", "nama" => "Gula Merah", "jumlah" => 41, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 738000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 9, "musim" => "Kemarau"],
        ["tanggal" => "2024-09-01", "nama" => "Perasa Makanan", "jumlah" => 28, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 168000,"supplier" => "R&W", "bulan" => 9, "musim" => "Kemarau"],

        ["tanggal" => "2024-10-01", "nama" => "Singkong", "jumlah" => 5400, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 86400000, "supplier" => "Petani Glantangan", "bulan" => 10, "musim" => "Hujan"],
        ["tanggal" => "2024-10-01", "nama" => "Gula Merah", "jumlah" => 67, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 1206000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 10, "musim" => "Hujan"],
        ["tanggal" => "2024-10-01", "nama" => "Perasa Makanan", "jumlah" => 30, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 180000, "supplier" => "R&W", "bulan" => 10, "musim" => "Hujan"],

        ["tanggal" => "2024-11-01", "nama" => "Singkong", "jumlah" => 5250, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 84000000, "supplier" => "Petani Glantangan", "bulan" => 11, "musim" => "Hujan"],
        ["tanggal" => "2024-11-01", "nama" => "Gula Merah", "jumlah" => 50, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 900000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 11, "musim" => "Hujan"],
        ["tanggal" => "2024-11-01", "nama" => "Perasa Makanan", "jumlah" => 45, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 270000,"supplier" => "R&W", "bulan" => 11, "musim" => "Hujan"],

        ["tanggal" => "2024-12-01", "nama" => "Singkong", "jumlah" => 5600, "satuan" => "Kg", "hargaSatuan" => 16000, "totalHarga" => 89600000, "supplier" => "Petani Glantangan", "bulan" => 12, "musim" => "Hujan"],
        ["tanggal" => "2024-12-01", "nama" => "Gula Merah", "jumlah" => 63, "satuan" => "Kg", "hargaSatuan" => 18000, "totalHarga" => 1134000, "supplier" => "Pedagang Pasar Mangli", "bulan" => 12, "musim" => "Hujan"],
        ["tanggal" => "2024-12-01", "nama" => "Perasa Makanan", "jumlah" => 20, "satuan" => "Btl", "hargaSatuan" => 6000, "totalHarga" => 120000, "supplier" => "R&W", "bulan" => 12, "musim" => "Hujan"],

      ];

      foreach ($dataPencatatan as $data) {
        Pencatatan::create($data);
      }

    }

}
