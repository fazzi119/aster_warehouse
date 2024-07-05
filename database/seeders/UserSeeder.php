<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            'nama' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'username' => 'superadmin',
            'password' => bcrypt('123'),
        ]);
        $superadmin->assignRole('superadmin');

        $admin = User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('123'),
        ]);
        $admin->assignRole('admin');

        $storeman = User::create([
            'nama' => 'storeman',
            'email' => 'storeman@gmail.com',
            'username' => 'storeman',
            'password' => bcrypt('123'),
        ]);
        $storeman->assignRole('storeman');
    }
}
