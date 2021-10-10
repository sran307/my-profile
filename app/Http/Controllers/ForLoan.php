<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Loan;
use App\Models\loan_amount;

class ForLoan extends Controller
{
    public function loan(){
        $data=loan::sum("Amount");
        $data1=loan_amount::sum("Amount");
        $data2=$data-$data1;
        return view("loan",["data"=>$data,"data1"=>$data1,"data2"=>$data2]);
    }   

    public function loanForm(Request $request){
        
        $loan = loan::create([
            "Date" => $request->post("date"),
            "Amount" => $request->post("amount")
        ]);
        $data=loan::sum("Amount");
        $data1=loan_amount::sum("Amount");
        $data2=$data-$data1;
        //dd($data);
        return response()->json([
            "data"=>$data,
            "data1"=>$data1,
            "data2"=>$data2
        ]);
    }
    public function loan_amount(Request $request){
        $amount=$request->post("amount");
        $date=$request->post("date");
        DB::beginTransaction();
        try{
            loan_amount::create([
                "Date"=>$date,
                "Amount"=>$amount
            ]);
            DB::commit();
            $data=loan::sum("Amount");
            $data1=loan_amount::sum("Amount");
            $data2=$data-$data1;
            return response()->json([
                "data"=>$data,
                "data1"=>$data1,
                "data2"=>$data2
            ]);
        }catch(\Exception $e){
            DB::rollback();
            return back();
        }
    }
}
