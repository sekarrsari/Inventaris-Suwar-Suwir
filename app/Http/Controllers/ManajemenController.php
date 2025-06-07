<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manajemen;
use App\Models\Supplier;

class ManajemenController extends Controller
{
    public function index() 
    {
        // Eager load relasi supplier untuk efisiensi jika Anda menampilkan nama supplier di tabel
        $bahan = Manajemen::with('supplier')->orderBy('kode', 'asc')->get();

        return view('manajemen.manajemen', [
            "title" => "Manajemen Bahan Baku",
            "bahanBaku" => $bahan
        ]);
    }

    public function create()
    {
        // Ambil data suppliers untuk di-pass ke view create
        $suppliers = Supplier::orderBy('namaSupplier', 'asc')->get(['id', 'namaSupplier']); // Sesuaikan 'namaSupplier' jika beda

        return view('manajemen.create', [
            "title" => "Tambah Bahan Baku",
            "suppliers" => $suppliers // Kirim data suppliers ke view
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:255',
            'jenis' => 'required|in:Bahan utama,Tambahan', 
            'satuan' => 'required|in:Kg,Btl',
            'supplier_id' => 'required|exists:suppliers,id', // Pastikan supplier_id ada di tabel suppliers
            'tanggalBeli' => 'required|date',
            'harga' => 'required|numeric',
            'stokMinimum' => 'required|numeric',
            'stok_aktual' => 'required|numeric',
            'status' => 'required|in:Tersedia,Hampir habis,Habis',
        ]);

            // Logika untuk membuat kode bahan baku otomatis
            $lastBahan = Manajemen::orderBy('kode', 'desc')->first();
            $nextNumber = 1;
            if ($lastBahan) {
                // Ekstrak nomor dari kode terakhir (misal dari BB02 menjadi 2)
                $lastNumber = (int) substr($lastBahan->kode, 2);
                $nextNumber = $lastNumber + 1;
            }
            // Format kode baru dengan padding nol (misal menjadi BB03)
            $validatedData['kode'] = 'BB' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        // Membuat record baru di database menggunakan model Manajemen
        Manajemen::create($validatedData);

        // Redirect kembali ke halaman daftar bahan baku dengan pesan sukses
        return redirect('/manajemen')->with('success', 'Data bahan baku berhasil ditambahkan!');
    }

    public function show(Manajemen $manajemen)
    {
        // Load relasi supplier jika belum ter-load (berguna jika tidak di-pass dari route binding dengan with)
        $manajemen->load('supplier');

        return view('manajemen.show', [
            "title" => "Detail Bahan Baku",
            "bahanBaku" => $manajemen
        ]);
    }

    public function edit(Manajemen $manajemen)
    {
        $suppliers = Supplier::orderBy('namaSupplier', 'asc')->get(['id', 'namaSupplier']);
        $manajemen->load('supplier'); // Pastikan relasi supplier juga dimuat untuk $bahanBaku
    
        return view('manajemen.edit', [
            "title" => "Edit Bahan Baku",
            "bahanBaku" => $manajemen,
            "suppliers" => $suppliers
        ]);    
    }   

    public function update(Request $request, Manajemen $manajemen)
    {
        // Validasi data yang masuk dari form
        $rules = [
            'nama' => 'required|max:255',
            'jenis' => 'required|in:Bahan utama,Tambahan',
            'satuan' => 'required|in:Kg,Btl',
            'supplier_id' => 'required|exists:suppliers,id',            'tanggalBeli' => 'required|date',
            'harga' => 'required|numeric',
            'stokMinimum' => 'required|numeric',
            'stok_aktual' => 'required|numeric',
            'status' => 'required|in:Tersedia,Hampir habis,Habis',
        ];

        // Jika kode diubah, tambahkan validasi unique
        // if ($request->kode != $manajemen->kode) {
        //     $rules['kode'] = 'required|max:255|unique:manajemens';
        // }

        $validatedData = $request->validate($rules);

        $manajemen->update($validatedData);

        // Redirect kembali ke halaman daftar bahan baku dengan pesan sukses
        return redirect('/manajemen')->with('success', 'Data bahan baku berhasil diperbarui!');
    }   

    public function destroy(Manajemen $manajemen)
    {
        Manajemen::destroy($manajemen->id); // Menghapus record
        return redirect('/manajemen')->with('success', 'Data bahan baku berhasil dihapus!'); // Redirect dengan pesan sukses
    }
}