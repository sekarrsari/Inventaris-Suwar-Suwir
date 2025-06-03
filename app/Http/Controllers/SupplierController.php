<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index() 
    {
        $supply = Supplier::orderBy('created_at', 'asc')->get();

        return view('supplier.supplier', [
            "title" => "Manajemen Supplier",
            "dataSupplier" => $supply
        ]);
    }

    public function create()
    {
        return view('supplier.create', [
            "title" => "Tambah Data Supplier"
        ]);
    }

    public function store(Request $request)    
    {
        $validatedData = $request->validate([
            'namaSupplier' => 'required|min:3|max:255',
            'bahan' => 'required|min:3|max:255',
            'tanggal' => 'required|date',
            'telepon'       =>
            [
                'nullable',
                'string',
                'max:13',
                // Regex memperbolehkan angka
                'regex:/^[0-9]+$/'
            ],                
            'alamat' => 'required|max:255',
            'status' => 'required|in:Aktif,Tidak Aktif,Dalam Peninjauan',
        ]);
        
        // Membuat record baru di database menggunakan model Supplier
        Supplier::create($validatedData);
        
        // Redirect kembali ke halaman daftar Supplier dengan pesan sukses
        return redirect('/supplier')->with('success', 'Data Supplier berhasil ditambahkan!');
    }

    public function show(Supplier $supplier)
    {
        return view('supplier.show', [
            "title" => "Detail Data Supplier",
            "dataSupplier" => $supplier
        ]);
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', [
            "title" => "Edit Data Supplier",
            "dataSupplier" => $supplier
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        // Validasi data yang masuk dari form
        $rules = [
            'namaSupplier' => 'required|min:3|max:255',
            'bahan' => 'required|min:3|max:255',
            'tanggal' => 'required|date',
            'telepon'       =>
            [
                'nullable',
                'string',
                'max:13',
                // Regex memperbolehkan angka
                'regex:/^[0-9]+$/'
            ],                
            'alamat' => 'required|max:255',
            'status' => 'required|in:Aktif,Tidak Aktif,Dalam Peninjauan',
        ];

        $validatedData = $request->validate($rules);

        $supplier->update($validatedData);

        // Redirect kembali ke halaman daftar Supplier dengan pesan sukses
        return redirect('/supplier')->with('success', 'Data Supplier berhasil diperbarui!');
    }

    public function destroy(Supplier $supplier)
    {
        Supplier::destroy($supplier->id); // Menghapus record
        return redirect('/supplier')->with('success', 'Data Supplier berhasil dihapus!'); // Redirect dengan pesan sukses
    }
}
