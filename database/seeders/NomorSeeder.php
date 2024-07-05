<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class NomorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nomors = [];
        for ($i = 1; $i <= 50; $i++) {
            $nomors[] = ['nomor' => $i];
        }
        DB::table('nomor')->insert($nomors);
    }
}
