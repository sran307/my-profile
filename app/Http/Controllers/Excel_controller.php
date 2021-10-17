<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UserExport;
use App\Exports\UserExport1;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
class Excel_controller extends Controller
{
    public function export(){
        return Excel::store(new UserExport1,'users.xlsx');
    }
}
