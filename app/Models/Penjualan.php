<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    /** @use HasFactory<\Database\Factories\PenjualanFactory> */
    use HasFactory;

    protected $guarded = [];

    // Opsional: Definisikan konstanta untuk bulan agar mudah digunakan di view/controller
    public const BULAN_LIST = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    // Accessor untuk mendapatkan urutan bulan (jika diperlukan untuk sorting kustom)
    public function getBulanOrderAttribute()
    {
        return array_search($this->bulan, self::BULAN_LIST);
    }

}
