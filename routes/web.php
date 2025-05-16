<?php

use App\Models\Manajemen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\PencatatanController;


Route::get('/', function () {
    return view('dashboard', [
        "title" => "Dashboard"
    ]);
});

Route::get('/bahan-baku', [ManajemenController::class, 'index']);

Route::get('/bahan-baku/create', [ManajemenController::class, 'create'])->name('bahan-baku.create');

// Route::get('/bahan-baku/{id}/edit', function ($id) {
//     return view('bahan-baku.edit_bahan', ['id' => $id]);
// });


Route::get('/pencatatan', [PencatatanController::class, 'index']);

Route::get('/pencatatan/create-stok-masuk', [PencatatanController::class, 'createStokMasuk'])->name('pencatatan.create-stok-masuk');

Route::get('/pencatatan/create-stok-keluar', [PencatatanController::class, 'createStokKeluar'])->name('pencatatan.create-stok-keluar');