<?php

namespace App\Exports;

use App\Models\LetterType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KlasifikasiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return LetterType::select('id', 'letter_code', 'name_type')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No', 'Kode Surat', 'Klasifikasi Surat',
        ];
    }
}
