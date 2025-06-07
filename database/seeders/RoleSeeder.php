<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        // $roles = ['mitra', 'pegawai'];

        // foreach ($roles as $role) {
        //     Role::firstOrCreate(['name' => $role]);
        // }
        
        // $mitra = User::find(1);
        // $mitra->assignRole('mitra');

        // $pegawai1 = User::find(2);
        // $pegawai1->assignRole('pegawai');

        // $pegawai2 = User::find(3);
        // $pegawai2->assignRole('pegawai');

        // Reset cached roles and permissions

        
        // Buat permissions untuk Supplier
        Permission::firstOrCreate(['name' => 'view_supplier']);
        Permission::firstOrCreate(['name' => 'create_supplier']);
        Permission::firstOrCreate(['name' => 'edit_supplier']);
        Permission::firstOrCreate(['name' => 'delete_supplier']);

        // Buat permissions untuk Manajemen
        Permission::firstOrCreate(['name' => 'view_manajemen']);
        Permission::firstOrCreate(['name' => 'create_manajemen']);
        Permission::firstOrCreate(['name' => 'edit_manajemen']);
        Permission::firstOrCreate(['name' => 'delete_manajemen']);

        // Buat permissions untuk Pencatatan
        Permission::firstOrCreate(['name' => 'view_pencatatan']);
        Permission::firstOrCreate(['name' => 'create_pencatatan']);
        Permission::firstOrCreate(['name' => 'edit_pencatatan']);
        Permission::firstOrCreate(['name' => 'delete_pencatatan']);

        // Buat permissions untuk Penjualan
        Permission::firstOrCreate(['name' => 'view_penjualan']);
        Permission::firstOrCreate(['name' => 'create_penjualan']);
        Permission::firstOrCreate(['name' => 'edit_penjualan']);
        Permission::firstOrCreate(['name' => 'delete_penjualan']);


        // Buat role mitra dan berikan izin HANYA MELIHAT
        $roleMitra = Role::firstOrCreate(['name' => 'mitra']);
        $roleMitra->givePermissionTo([
            // CRUD Supplier
            'view_supplier', 
            'create_supplier',
            'edit_supplier',
            'delete_supplier',
            // CRUD Manajemen Bahan Baku
            'view_manajemen',
            'create_manajemen',
            'edit_manajemen',
            'delete_manajemen',
            // View Pencatatan
            'view_pencatatan', 
            // View Penjualan
            'view_penjualan'
        ]);

        // Buat role pegawai dan berikan SEMUA izin (CRUD)
        $rolePegawai = Role::firstOrCreate(['name' => 'pegawai']);
        // $rolePegawai->givePermissionTo(Permission::all());
        $rolePegawai->givePermissionTo([
            // View Supplier
            'view_supplier',
            // RUD Manajemen Bahan Baku
            'view_manajemen',
            'edit_manajemen',
            // CRUD Pencatatan
            'view_pencatatan', 
            'create_pencatatan',
            'edit_pencatatan',
            'delete_pencatatan',
            // CRUD Penjualan
            'view_penjualan',
            'create_penjualan',
            'edit_penjualan',
            'delete_penjualan'
        ]);

        // Assign roles to users
        $mitra = User::find(1); // Candiber
        if ($mitra) {
            $mitra->assignRole($roleMitra);
        }

        $pegawai1 = User::find(2); // Pegawai
        if ($pegawai1) {
            $pegawai1->assignRole($rolePegawai);
        }

        $pegawai2 = User::find(3); // Abou
        if ($pegawai2) {
            $pegawai2->assignRole($rolePegawai);
        }

    }
}
