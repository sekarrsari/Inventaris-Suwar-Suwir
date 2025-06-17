<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Manajemen;
use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SupplierSeeder::class,
            RoleSeeder::class,
        ]);

        $mitraRole = Role::findByName('mitra');
        $pegawaiRole = Role::findByName('pegawai');

        // Membuat user "Candiber" dan memberinya peran "mitra"
        $userCandiber = User::create([
            'name' => 'Candiber',
            'password' => bcrypt('123'),
            'email' => 'candiber@gmail.com',
        ]);
        $userCandiber->assignRole($mitraRole);

        // Membuat user "Abou" dan memberinya peran "mitra" juga
        $userAbou = User::create([
            'name' => 'Abou',
            'password' => bcrypt('123'),
            'email' => 'abou@gmail.com',
        ]);
        $userAbou->assignRole($mitraRole);

        // Tambah data Pegawai
        DB::transaction(function () use ($pegawaiRole, $userCandiber) {
            $userPegawaiAgus = User::create([
                'name' => 'Agus Santoso',
                'email' => 'agus@gmail.com',
                'password' => Hash::make('123'),
            ]);
            $userPegawaiAgus->assignRole($pegawaiRole);
            Pegawai::create([
                'user_id' => $userPegawaiAgus->id,
                'mitra_id' => $userCandiber->id,
                'nama_lengkap' => 'Agus Santoso',
                'alamat' => 'Jl. Merdeka No. 10, Jember',
                'nomor_telepon' => '081234567890',
            ]);
        });


        // CATATAN: User 'Pegawai' statis sebaiknya dihapus dari seeder,
        // karena sekarang pegawai akan dibuat oleh mitra melalui aplikasi.
        // User::create([
        //     'name' => 'Pegawai',
        //     'password' => bcrypt('123'),
        //     'email' => 'pegawai.candiber@gmail.com',
        // ]);


        $this->call([
            ManajemenSeeder::class,
            PencatatanSeeder::class,
            PenjualanSeeder::class
        ]);

        // User::create([
        //     'name' => 'Candiber',
        //     'password' => bcrypt('123'),
        //     'email' => 'candiber@gmail.com',
        // ]);

        // User::create([
        //     'name' => 'Pegawai',
        //     'password' => bcrypt('123'),
        //     'email' => 'pegawai.candiber@gmail.com',
        // ]);

        // User::create([
        //     'name' => 'Abou',
        //     'password' => bcrypt('123'),
        //     'email' => 'abou@gmail.com',
        // ]);


        // $this->call([
        //     SupplierSeeder::class,
        //     RoleSeeder::class,
        //     ManajemenSeeder::class,
        //     PencatatanSeeder::class,
        //     PenjualanSeeder::class
        // ]);

    }
}
