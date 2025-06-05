<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencatatan;
use Carbon\Carbon; // Untuk manipulasi tanggal

class PencatatanController extends Controller
{
    public function index(Request $request)
    {
        // 1. Memulai "rencana" query, disimpan di $query
        $query = Pencatatan::query(); // $query adalah instance Query Builder, BELUM mengambil data

        // 2. Jika ada filter nama, tambahkan kondisi ke "rencana" query
        if ($request->filled('search_nama')) {
            $query->where('nama', 'LIKE', '%' . $request->search_nama . '%');
        }

        // 3. Jika ada filter tanggal, tambahkan kondisi ke "rencana" query
        if ($request->filled('search_tanggal')) {
            // Menggunakan whereDate untuk membandingkan hanya bagian tanggal
            // dari kolom 'tanggal' (berguna jika kolomnya bertipe DATETIME)
            $query->whereDate('tanggal', $request->search_tanggal);
        }

        // 4. Tambahkan pengurutan ke "rencana" query
        $query->orderBy('tanggal', 'desc')
            ->orderBy('id', 'desc');

        // 5. Eksekusi "rencana" query dan ambil hasilnya (dengan pagination), baru hasilnya disimpan ke variabel $stok.
        // Mengambil data dengan pagination (misalnya 10 item per halaman)
        // Anda bisa mengganti angka 10 sesuai kebutuhan
        $stok = $query->paginate(10); // $stok sekarang berisi hasil (objek pagination)

        return view('pencatatan.pencatatan', [
            "title" => "Pencatatan Stok Masuk",
            "stokMasuk" => $stok
        ]);
    }
    // public function index()
    // {
    //     $stok = Pencatatan::orderBy('tanggal', 'desc')
    //     ->orderBy('id', 'desc')
    //     ->get(); 

    //     return view('pencatatan.pencatatan', [
    //         "title" => "Pencatatan",
    //         "stokMasuk" => $stok
    //     ]);
    // }
    public function create()
    {
        return view('pencatatan.create', [
            "title" => "Tambah Pencatatan Stok Masuk"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'nama' => 'required|min:3|max:255',
            'jumlah' => 'required|numeric',
            'satuan' => 'required|in:Kg,Btl',
            'hargaSatuan' => 'required|numeric',
            'totalHarga' => 'required|numeric',
            'supplier' => 'required|max:255'
        ]);

        // Proses data tanggal untuk mendapatkan bulan dan musim
        $tanggalInput = Carbon::parse($validatedData['tanggal']);

        // Mengisi 'bulan' dengan angka bulan dengan leading zero (format string '01'-'12')
        $validatedData['bulan'] = $tanggalInput->month;

        $nomorBulan = $tanggalInput->month;

        if ($nomorBulan >= 4 && $nomorBulan <= 9) { // April (4) - September (9)
            $validatedData['musim'] = 'Kemarau';
        } else { // Oktober (10) - Maret (3)
            $validatedData['musim'] = 'Hujan';
        }

        // Membuat record baru di database menggunakan model Pencatatan
        Pencatatan::create($validatedData);

        // Redirect kembali ke halaman daftar bahan baku dengan pesan sukses
        return redirect('/pencatatan')->with('success', 'Pencatatan stok berhasil ditambahkan!');
    }

    public function show(Pencatatan $pencatatan)
    {
        return view('pencatatan.show', [
            "title" => "Detail Pencatatan Stok",
            "stokMasuk" => $pencatatan
        ]);
    }

    public function edit(Pencatatan $pencatatan)
    {
        return view('pencatatan.edit', [
            "title" => "Edit Pencatatan Stok",
            "stokMasuk" => $pencatatan
        ]);
    }

    public function update(Request $request, Pencatatan $pencatatan)
    {
        // Validasi data yang masuk dari form
        $rules = [
            'tanggal' => 'required|date',
            'nama' => 'required|min:3|max:255',
            'jumlah' => 'required|numeric',
            'satuan' => 'required|in:Kg,Btl',
            'hargaSatuan' => 'required|numeric',
            'totalHarga' => 'required|numeric',
            'supplier' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        // Proses data tanggal untuk mendapatkan bulan dan musim
        $tanggalInput = Carbon::parse($validatedData['tanggal']);

        // Mengisi 'bulan' dengan angka bulan dengan leading zero (format string '01'-'12')
        $validatedData['bulan'] = $tanggalInput->month;

        $nomorBulan = $tanggalInput->month;

        if ($nomorBulan >= 4 && $nomorBulan <= 9) {
            $validatedData['musim'] = 'Kemarau';
        } else {
            $validatedData['musim'] = 'Hujan';
        }

        $pencatatan->update($validatedData);

        // Redirect kembali ke halaman daftar bahan baku dengan pesan sukses
        return redirect('/pencatatan')->with('success', 'Pencatatan stok berhasil diperbarui!');
    }

    public function destroy(Pencatatan $pencatatan)
    {
        Pencatatan::destroy($pencatatan->id); // Menghapus record
        return redirect('/pencatatan')->with('success', 'Pencatatan stok berhasil dihapus!'); // Redirect dengan pesan sukses
    }
}
