<?php

namespace Database\Seeders;

use App\Models\Rak;
use Illuminate\Database\Seeder;

class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($rak = 'A'; $rak <= 'N'; $rak++) {
            Rak::create([
                'rak' => $rak,
            ]);
        }
    }
}
