<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportBarang implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function query()
    {
        return Barang::query();
    }

    public function map($barang): array
    {
        return [

            $barang->id,
            $barang->nama,
            $barang->kode,
            $barang->info

        ];
    }

    public function headings(): array
    {
        return [
            'No ID',
            'Nama Barang',
            'Kode Barang',
            'Keterangan',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'D' => 55
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);
        $sheet->getStyle('D1:D' . $sheet->getHighestRow())->getAlignment()->setWrapText(true);
    }
}
