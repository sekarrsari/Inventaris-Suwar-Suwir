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
    public function create()
    {
        return view('pencatatan.create', [
            "title" => "Tambah Pencatatan Stok Masuk"
        ]);
    }

    // public function createStokKeluar()
    // {
    //     return view('pencatatan.create_stok_keluar', [
    //         "title" => "Tambah Pencatatan Stok Keluar"
    //     ]);
    // }
}
