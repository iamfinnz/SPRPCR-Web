<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RiwayatDataExport implements FromArray, WithHeadings
{
    protected $riwayat;
    protected $headings;

    public function __construct(array $riwayat, array $headings)
    {
        $this->riwayat = $riwayat;
        $this->headings = $headings;
    }

    public function array(): array
    {
        // Format riwayat dari Firebase ke dalam format Collection
        // Sesuaikan ini dengan struktur riwayat di Firebase
        return $this->riwayat;
    }

    public function headings(): array
    {
        return $this->headings;
    }
}
