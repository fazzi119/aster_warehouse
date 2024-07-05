<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah-barang']);
        Permission::create(['name' => 'edit-barang']);
        Permission::create(['name' => 'import-barang']);
        Permission::create(['name' => 'hapus-barang']);
        Permission::create(['name' => 'lihat-barang']);
        Permission::create(['name' => 'restok-barang']);
        Permission::create(['name' => 'barang-masuk']);
        Permission::create(['name' => 'barang-keluar']);

        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'storeman']);

        $roleSuperadmin = Role::findByName('superadmin');
        $roleSuperadmin->givePermissionTo(Permission::all());

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-barang');
        $roleAdmin->givePermissionTo('edit-barang');
        $roleAdmin->givePermissionTo('lihat-barang');

        $roleStoreman = Role::findByName('storeman');
        $roleStoreman->givePermissionTo('barang-keluar');
        $roleStoreman->givePermissionTo('barang-masuk');
    }
}
