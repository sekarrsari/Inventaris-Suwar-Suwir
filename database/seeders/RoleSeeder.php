<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $roles = ['admin', 'pegawai'];

        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::firstOrCreate(['name' => $role]);
        }
        
        $admin = User::find(1);
        $admin->assignRole('admin');

        $pegawai1 = User::find(2);
        $pegawai1->assignRole('pegawai');

        $pegawai2 = User::find(3);
        $pegawai2->assignRole('pegawai');

    }
}
