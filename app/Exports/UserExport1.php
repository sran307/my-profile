<?php

namespace App\Exports;

use App\Models\Nwork;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport1 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nwork::all();
    }
}
