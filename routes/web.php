<?php

use App\Models\Manajemen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\PencatatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PeramalanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfilController;


Route::get('/', function () {
    return redirect('/login');
});

// Route untuk proses Login dan Logout
Route::get('/login', action: [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', action: [LoginController::class, 'authenticate']);
Route::post('/logout', action: [LoginController::class, 'logout']);


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
| Semua rute di dalam grup ini akan otomatis dilindungi oleh middleware 'auth',
| yang memastikan hanya pengguna yang sudah login yang bisa mengaksesnya.
*/

Route::middleware(['auth'])->group(function () {
    // Rute untuk halaman dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
    
    // Manajemen Bahan Baku Routes
    Route::resource('manajemen', ManajemenController::class)->parameters([
        'manajemen' => 'manajemen' // Parameter opsional jika nama parameter di route berbeda dengan nama model
    ]);
    
    // Pencatatan Stok
    Route::resource('pencatatan', PencatatanController::class)->parameters([
        'pencatatan' => 'pencatatan'
    ]);
    
    // Supplier
    Route::resource('supplier', SupplierController::class)->parameters([
        'supplier' => 'supplier'
    ]);
    
    // Penjualan
    Route::resource('penjualan', PenjualanController::class)->parameters([
        'penjualan' => 'penjualan'
    ]);

    // Pegawai
    Route::resource('pegawai', PegawaiController::class)->parameters([
        'pegawai' => 'pegawai'
    ]);

    // Profil
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');

    // Peramalan
    // Route untuk MENAMPILKAN halaman form peramalan
    Route::get('/peramalan', [PeramalanController::class, 'index'])->name('peramalan.index');
    
    // Route untuk MEMPROSES data dari form peramalan
    Route::post('/peramalan', [PeramalanController::class, 'submit'])->name('peramalan.submit');
});
