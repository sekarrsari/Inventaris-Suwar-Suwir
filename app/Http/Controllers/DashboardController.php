<?php

namespace App\Http\Controllers;

use App\Models\Manajemen;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";

        // Ambil data bahan baku
        // $singkong = Manajemen::where('nama', 'Singkong')->first();
        // $gulaMerah = Manajemen::where('nama', 'Gula Merah')->first();
        // $perasa = Manajemen::where('nama', 'Perasa Makanan')->first();
        // $data = [
        //     'singkong' => $singkong,
        //     'gulaMerah' => $gulaMerah,
        //     'perasa' => $perasa,
        // ];
        // return view('dashboard', $data);

        $bahanBakuItems = Manajemen::orderBy('updated_at', 'desc')
            ->take(3)
            ->get();

        // dd($bahanBakuItems);


        return view('dashboard', compact('title', 'bahanBakuItems'));


        // return view('dashboard', [
        //     "title" => "Dashboard"
        // ]);
    }
}
