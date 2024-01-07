<?php

namespace App\Exports;

use App\Models\Letter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DatasuratExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Letter::select('id', 'letter_type_id', 'letter_perihal', 'receipients', 'notulis')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No', 'Nomor Surat', 'Perihal', 'Penerima Surat','Notulis'
        ];
    }
}
