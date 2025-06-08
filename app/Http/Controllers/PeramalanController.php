<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;


class PeramalanController extends Controller
{
    /**
     * Menampilkan halaman utama peramalan dengan form input.
     */
    public function index()
    {
        // Cukup tampilkan view-nya saja
        return view('peramalan.peramalan',[
            "title" => "Peramalan Pengadaan"
        ]);
    }

    /**
     * Menerima request dari form, memanggil API, dan menampilkan hasilnya.
     */
    public function submit(Request $request)
    {
        // 1. Validasi input: kita hanya butuh satu nomor bulan
        $validated = $request->validate([
            'bulan' => 'required|integer|min:1|max:12'
        ]);
        
        $nomorBulan = (int) $validated['bulan'];

        // 2. Tentukan musim berdasarkan bulan (logika ini meniru script Python Anda)
        $musim = in_array($nomorBulan, [11, 12, 1, 2, 3]) ? 'Hujan' : 'Kemarau';

        // 3. Panggil API Python
        $apiUrl = 'http://127.0.0.1:5000/predict';
        
        try {
            $response = Http::post($apiUrl, [
                // API Python mengharapkan array, jadi kita bungkus dalam array
                'Bulan' => [$nomorBulan],
                'Musim' => [$musim]
            ]);

            // 4. Proses response dari API
            if ($response->successful()) {
                $dataApi = $response->json();
                
                // Siapkan data untuk dikirim ke view
                $hasil = [
                    'bulan_nama'         => $this->getNamaBulan($nomorBulan),
                    'musim'              => $musim,
                    'prediksi_dasar'     => $dataApi['prediksi_dasar'][0],
                    'prediksi_disesuaikan' => $dataApi['prediksi_disesuaikan'][0],
                    'bulan_nomor'        => $nomorBulan // <-- TAMBAHKAN BARIS INI
                ];
                // DEFINISIKAN JUGA TITLE DI SINI
                $title = 'Hasil Peramalan Pengadaan';

                // Kembalikan view dengan 'hasil' DAN 'title'
                return view('peramalan.peramalan', compact('hasil', 'title')); // <-- SEKARANG MENGIRIM KEDUANYA

            } else {
                // Jika API merespon dengan error (misal: 4xx atau 5xx)
                return back()->with('error', 'Layanan peramalan memberikan respon error: ' . $response->body());
            }

        } catch (ConnectionException $e) {
            // Jika tidak bisa terhubung ke API Python (server python mati, dll)
            return back()->with('error', 'Tidak dapat terhubung ke layanan peramalan. Pastikan server API Python sedang berjalan.');
        }
    }

    /**
     * Helper function untuk mendapatkan nama bulan dari nomornya.
     */
    private function getNamaBulan(int $nomorBulan): string
    {
        $daftar_bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        return $daftar_bulan[$nomorBulan] ?? 'Tidak Diketahui';
    }
}
