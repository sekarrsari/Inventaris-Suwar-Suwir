<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manajemen;

class ManajemenController extends Controller
{
    public function index() 
    {
        $bahan = Manajemen::all();

        return view('bahan-baku.bahan_baku', [
            "title" => "Manajemen",
            "bahanBaku" => $bahan
        ]);
    }

    public function create()
    {
        return view('bahan-baku.create_bahan', [
            "title" => "Tambah Bahan Baku"
        ]);
    }
}