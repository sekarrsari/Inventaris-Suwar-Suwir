<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencatatan;

class PencatatanController extends Controller
{
    public function index()
    {
        $pencatatan = Pencatatan::all();

        return view('pencatatan.pencatatan', [
            "title" => "Pencatatan",
            "pencatatanStok" => $pencatatan
        ]);
    }
    public function createStokMasuk()
    {
        return view('pencatatan.create_stok_masuk', [
            "title" => "Tambah Pencatatan Stok Masuk"
        ]);
    }

    public function createStokKeluar()
    {
        return view('pencatatan.create_stok_keluar', [
            "title" => "Tambah Pencatatan Stok Keluar"
        ]);
    }
}
