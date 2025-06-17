<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Menampilkan halaman profil dari pengguna yang sedang login.
     */
    public function show()
    {
        // 1. Definisikan title untuk halaman
        $title = "Profil Saya";

        /** @var \App\Models\User $user */ // <-- TAMBAHKAN BARIS INI
        // 2. Ambil data lengkap dari pengguna yang sedang login
        $user = Auth::user();

        // 3. Jika user adalah seorang pegawai, kita juga muat data profil pegawainya
        //    menggunakan relasi yang sudah kita buat sebelumnya.
        if ($user->hasRole('pegawai')) {
            $user->load('profilPegawai');
        }

        // 4. Kirim data ke view
        return view('profil', compact('user', 'title'));
    }
}
