<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manajemen;

class ManajemenController extends Controller
{
    public function index() 
    {
        $bahan = Manajemen::orderBy('kode', 'asc')->get(); // Urutkan berdasarkan kode

        return view('manajemen.manajemen', [
            "title" => "Manajemen",
            "bahanBaku" => $bahan
        ]);
    }

    public function create()
    {
        return view('manajemen.create', [
            "title" => "Tambah Bahan Baku"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:255',
            'jenis' => 'required|in:Bahan utama,Tambahan', // Jenis harus salah satu dari opsi
            'satuan' => 'required|in:Kg,Liter', // Satuan harus salah satu dari opsi
            'supplier' => 'required|max:255',
            'tanggalBeli' => 'required|date',
            'harga' => 'required|numeric',
            'stokMinimum' => 'required|numeric',
            'status' => 'required|in:Tersedia,Hampir habis,Habis', // Status harus salah satu dari opsi
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
        
                // Pastikan kode unik, meskipun seharusnya sudah unik karena logika di atas
                // Ini sebagai lapisan keamanan tambahan jika ada kondisi balapan (race condition)
                // Namun, untuk aplikasi skala kecil, ini mungkin tidak terlalu kritikal
                // Jika ingin sangat aman, bisa ditambahkan loop dengan pengecekan unik
                // while (Manajemen::where('kode', $validatedData['kode'])->exists()) {
                //     $nextNumber++;
                //     $validatedData['kode'] = 'BB' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
                // }
        
        // Membuat record baru di database menggunakan model Manajemen
        Manajemen::create($validatedData);

        // Redirect kembali ke halaman daftar bahan baku dengan pesan sukses
        return redirect('/manajemen')->with('success', 'Data bahan baku berhasil ditambahkan!');
    }

    public function show(Manajemen $manajemen)
    {
        return view('manajemen.show', [
            "title" => "Detail Bahan Baku",
            "bahanBaku" => $manajemen
        ]);
    }

    public function edit(Manajemen $manajemen)
    {
        return view('manajemen.edit', [
            "title" => "Edit Bahan Baku",
            "bahanBaku" => $manajemen
        ]);
    }   

    public function update(Request $request, Manajemen $manajemen)
    {
        // Validasi data yang masuk dari form
        $rules = [
            'nama' => 'required|max:255',
            'jenis' => 'required|in:Bahan utama,Tambahan',
            'satuan' => 'required|in:Kg,Liter',
            'supplier' => 'required|max:255',
            'tanggalBeli' => 'required|date',
            'harga' => 'required|numeric',
            'stokMinimum' => 'required|numeric',
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