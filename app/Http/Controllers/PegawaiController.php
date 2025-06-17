<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class PegawaiController extends Controller
{
    /**
     * Menampilkan daftar pegawai yang dibuat oleh mitra yang sedang login.
     */
    public function index()
    {
        $title = "Manajemen Pegawai";

        $dataPegawai = Pegawai::where('mitra_id', Auth::id())->with('user')->oldest()->get();
        return view('pegawai.pegawai', compact('dataPegawai', 'title'));
    }

    /**
     * Menampilkan form untuk membuat pegawai baru.
     */
    public function create()
    {
        return view('pegawai.create', [
            'title' => 'Tambah Data Pegawai',
        ]);
    }

    /**
     * Menyimpan pegawai baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Pastikan email unik di tabel users
            'password' => 'required|min:8|confirmed',
            'nomor_telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        DB::transaction(function () use ($request) {
            // Buat akun login untuk pegawai
            $user = User::create([
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            // Penugasan peran akan dilakukan oleh Spatie setelah ini
            $user->assignRole('pegawai'); // Pastikan Anda menambahkan ini
            
            // 4. Buat record di tabel 'pegawais' untuk PROFIL
            $user->profilPegawai()->create([ // Menggunakan relasi
                'mitra_id'      => Auth::id(), // ID mitra yang sedang login
                'nama_lengkap'  => $request->nama_lengkap,
                'alamat'        => $request->alamat,
                'nomor_telepon' => $request->nomor_telepon,
            ]);
        });

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data pegawai.
     */
    public function edit(Pegawai $pegawai)
    {
        $title = "Edit Data Pegawai";

        // Pastikan mitra hanya bisa mengedit pegawainya sendiri
        if ($pegawai->mitra_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        // Ganti nama variabel sebelum dikirim ke view
        $dataPegawai = $pegawai; 
        return view('pegawai.edit', compact('dataPegawai', 'title'));

    }

    /**
     * Memperbarui data pegawai di database.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        // Pastikan mitra hanya bisa mengupdate pegawainya sendiri
        if ($pegawai->mitra_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            // SOLUSI UNTUK EMAIL: Abaikan user_id saat ini saat memeriksa keunikan
            'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($pegawai->user_id)],
            'password' => 'nullable|min:8|confirmed',
            'nomor_telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request, $pegawai) {
            // Update data di tabel user
            $user = $pegawai->user;
            $user->name = $request->nama_lengkap;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            // Update data di tabel 'pegawais'
            $pegawai->update([
                'nama_lengkap' => $request->nama_lengkap,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat' => $request->alamat,
            ]);

            // Update data di tabel 'users'
            $pegawai->user->update([
                'name' => $request->nama_lengkap,
                'email' => $request->email,
            ]);

            // Jika password diisi, update password
            if ($request->filled('password')) {
                $pegawai->user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

        });
        
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Menghapus data pegawai dari database.
     */
    public function destroy(Pegawai $pegawai)
    {
        // Pastikan mitra hanya bisa menghapus pegawainya sendiri
        if ($pegawai->mitra_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }
        
        // Karena di migration ada onDelete('cascade'), menghapus user akan otomatis menghapus profil pegawainya.
        User::find($pegawai->user_id)->delete();

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
