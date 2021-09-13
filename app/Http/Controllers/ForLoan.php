<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Loan;

class ForLoan extends Controller
{
    public function loan(){
        return view("loan");
    }   

    public function loanForm(Request $request){
        $validate_data = $request -> validate([
            "date" => "required",
            "amount" => "required"
        ]);
        $loan = loan::create([
            "Date" => $request->post("date"),
            "Amount" => $request->post("amount")
        ]);
        return back();
    }
    public function loan_amount(){
        $data = loan::sum("Amount");
        return view("loanAmount",["data"=>$data]);
    }
}
