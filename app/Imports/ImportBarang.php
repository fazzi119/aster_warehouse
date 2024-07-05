<?php

namespace App\Imports;

use App\Models\Barang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class ImportBarang implements ToCollection, WithHeadingRow
{
    /**
     * @param array $rows
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $barang = Barang::where('kode', $row['kode_barang'])->first();
            if ($barang) {
                $barang->update([
                    'nama' => $row['nama_barang'],
                    'kode' => $row['kode_barang'],
                    'info' => $row['keterangan'] ?? null,
                ]);
            } else {

                Barang::create([
                    'nama' => $row['nama_barang'] ?? null,
                    'kode' => $row['kode_barang'],
                    'info' => $row['keterangan'] ?? null,
                ]);
            }
        }
    }
}