<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gudang>
 */
class GudangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'barang_id' => \App\Models\Barang::all()->pluck('id')->random(),
            'vendor_id' => \App\Models\Vendor::all()->pluck('id')->random(),
            // 'kategori_id' => \App\Models\Kategori::all()->pluck('id')->mt_rand(1, 2),
            'kategori_id' => 1,
            'rak_id' => \App\Models\Rak::all()->pluck('id')->random(),
            'nomor_id' => \App\Models\Nomor::all()->pluck('id')->random(),
            // 'baris_id' => \App\Models\Baris::all()->pluck('id')->mt_rand(1, 40),
            'baris_id' => 2,
            'jumlah' => $this->faker->numberBetween(0, 9999999),
            // 'satuan_id' => \App\Models\Satuan::all()->pluck('id')->mt_rand(1, 40),
            'satuan_id' => 1,
            'info' => $this->faker->paragraph(),

        ];
    }
}
