<?php

namespace App\Imports;

use App\Models\chitty;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new chitties([
            'Date'=>$row[0],
            'Amount'=>$row[1]
        ]);
    }
}
