<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manajemen extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $table = "manajemens";
    protected $fillable = [
        'kode', 
        'nama', 
        'jenis', 
        'satuan', 
        'supplier_id',
        'tanggalBeli', 
        'harga', 
        'stokMinimum', 
        'stok_aktual', 
        'status'
    ];

        // Casts untuk tipe data, terutama untuk tanggal
        protected $casts = [
            'tanggalBeli' => 'date', // atau 'datetime' jika ada waktu
            'stokMinimum' => 'integer', // atau 'integer'
            'stok_aktual' => 'integer', // atau 'integer'
        ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
