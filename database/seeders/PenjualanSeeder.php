<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penjualan;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPenjualan = [
            [
                'bulan' => 'Januari',
                'tahun' => 2024,
                'jumlah_ori' => 3600,
                'jumlah_rasa' => 1000,
            ],
            [
                'bulan' => 'Februari',
                'tahun' => 2024,
                'jumlah_ori' => 3950,
                'jumlah_rasa' => 950,
            ],
            [
                'bulan' => 'Maret',
                'tahun' => 2024,
                'jumlah_ori' => 3700,
                'jumlah_rasa' => 1000,
            ],
            [
                'bulan' => 'April',
                'tahun' => 2024,
                'jumlah_ori' => 4500,
                'jumlah_rasa' => 1000,
            ],
            [
                'bulan' => 'Mei',
                'tahun' => 2024,
                'jumlah_ori' => 4650,
                'jumlah_rasa' => 950,
            ],
            [
                'bulan' => 'Juni',
                'tahun' => 2024,
                'jumlah_ori' => 5500,
                'jumlah_rasa' => 950,
            ],
            [
                'bulan' => 'Juli',
                'tahun' => 2024,
                'jumlah_ori' => 3800,
                'jumlah_rasa' => 600,
            ],
            [
                'bulan' => 'Agustus',
                'tahun' => 2024,
                'jumlah_ori' => 4000,
                'jumlah_rasa' => 800,
            ],
            [
                'bulan' => 'September',
                'tahun' => 2024,
                'jumlah_ori' => 2800,
                'jumlah_rasa' => 600,
            ],
            [
                'bulan' => 'Oktober',
                'tahun' => 2024,
                'jumlah_ori' => 3750,
                'jumlah_rasa' => 650,
            ],
            [
                'bulan' => 'November',
                'tahun' => 2024,
                'jumlah_ori' => 3500,
                'jumlah_rasa' => 650,
            ],
            [
                'bulan' => 'Desember',
                'tahun' => 2024,
                'jumlah_ori' => 2000,
                'jumlah_rasa' => 600,
            ],
        ];

        foreach ($dataPenjualan as $data) {
            Penjualan::create($data);
        }
    }
}
