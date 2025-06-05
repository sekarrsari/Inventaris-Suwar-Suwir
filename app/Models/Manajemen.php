<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manajemen extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        'kode', 
        'nama', 
        'jenis', 
        'satuan', 
        'supplier_id',
        'tanggalBeli', 
        'harga', 
        'stokMinimum', 
        'status'
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
