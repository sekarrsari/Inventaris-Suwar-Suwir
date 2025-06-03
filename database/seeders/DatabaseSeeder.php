<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Manajemen;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Candiber',
            'password' => bcrypt('123'),
            'email' => 'candiber@gmail.com',
        ]);

        User::create([
            'name' => 'Pegawai',
            'password' => bcrypt('123'),
            'email' => 'pegawai.candiber@gmail.com',
        ]);

        User::create([
            'name' => 'Abou',
            'password' => bcrypt('123'),
            'email' => 'abou@gmail.com',
        ]);


        $this->call([
            ManajemenSeeder::class,
            PencatatanSeeder::class,
            RoleSeeder::class,
            SupplierSeeder::class
        ]);

    }
}
