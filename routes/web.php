<?php

use App\Models\Manajemen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\PencatatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PenjualanController;


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

    // // PENCATATAN STOK MASUK : Mitra bisa melihat, Pegawai bisa CRUD
    // Route::resource('pencatatan', PencatatanController::class)->middleware([
    //     'index'   => 'can:view_pencatatan',
    //     'show'    => 'can:view_pencatatan',
    //     'create'  => 'can:create_pencatatan',
    //     'store'   => 'can:create_pencatatan',
    //     'edit'    => 'can:edit_pencatatan',
    //     'update'  => 'can:edit_pencatatan',
    //     'destroy' => 'can:delete_pencatatan',
    // ]);

    // // PENJUALAN: Mitra bisa melihat, Pegawai bisa CRUD
    // Route::resource('penjualan', PenjualanController::class)->middleware([
    //     // 'index' & 'show' adalah method untuk menampilkan data (Read)
    //     'index'   => 'can:view_penjualan',
    //     'show'    => 'can:view_penjualan',
    //     'create'  => 'can:create_penjualan',
    //     'store'   => 'can:create_penjualan',
    //     'edit'    => 'can:edit_penjualan',
    //     'update'  => 'can:edit_penjualan',
    //     'destroy' => 'can:delete_penjualan',
    // ]);
    
    // Route::resource('manajemen', ManajemenController::class)->middleware([
    //     'index'   => 'can:view_manajemen',
    //     'show'    => 'can:view_manajemen',
    //     'create'  => 'can:create_manajemen',
    //     'store'   => 'can:create_manajemen',
    //     'edit'    => 'can:edit_manajemen',
    //     'update'  => 'can:edit_manajemen',
    //     'destroy' => 'can:delete_manajemen',
    // ]);
    
    // Route::resource('supplier', SupplierController::class)->middleware([
    //     'index'   => 'can:view_supplier',
    //     'show'    => 'can:view_supplier',
    //     'create'  => 'can:create_supplier',
    //     'store'   => 'can:create_supplier',
    //     'edit'    => 'can:edit_supplier',
    //     'update'  => 'can:edit_supplier',
    //     'destroy' => 'can:delete_supplier',
    // ]);
    
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
});
