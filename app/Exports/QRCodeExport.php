<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QRCodeExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Create an empty collection (no actual data)
        return new Collection([]);
    }

    public function headings(): array
    {
        // Define the column headings (modify this according to your needs)
        return [
            'QR Code Value',
        ];
    }
}
