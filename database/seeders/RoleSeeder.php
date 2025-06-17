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

        
        // 

        // --- Buat Semua Permissions ---
        $permissions = [
            'view_pegawai', 'create_pegawai', 'edit_pegawai', 'delete_pegawai',
            'view_supplier', 'create_supplier', 'edit_supplier', 'delete_supplier',
            'view_manajemen', 'create_manajemen', 'edit_manajemen', 'delete_manajemen',
            'view_pencatatan', 'create_pencatatan', 'edit_pencatatan', 'delete_pencatatan',
            'view_penjualan', 'create_penjualan', 'edit_penjualan', 'delete_penjualan',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat role mitra dan berikan izin HANYA MELIHAT
        $roleMitra = Role::firstOrCreate(['name' => 'mitra']);
        $roleMitra->givePermissionTo([
            // CRUD Pegawai
            'view_pegawai', 
            'create_pegawai',
            'edit_pegawai',
            'delete_pegawai',
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
            // View Pagawai
            'view_pegawai',
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
