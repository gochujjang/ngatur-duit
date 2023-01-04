<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemasukanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Mengembalikan semua nilai data
        // Yang nantinya akan di export
        return Pemasukan::all();
    }
}
