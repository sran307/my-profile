<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\expense;
use App\Models\expense_amount;

use App\Models\income;
use App\Models\income_amount;



class Budget extends Controller
{
    public function expense(){
        return view("expense");
    }

    public function expense_form(Request $request){
        $date = $request->post("date");
        expense::create(['Date'=>$date]);
        $id = expense::max("id");
        return view("expense_amount",["id"=>$id,"date"=>$date]);
    }
    
    public function expense_amount_form(Request $request){
        expense_amount::create(['Date_id'=>$request->post("date_id"),
            'Date'=>$request->post("date"),
            'Expenses_reason'=>$request->post("reason"),
            'Amount'=>$request->post("amount")    
        ]);
        $id = expense::max("id");
        $date = $request->post("date");
        return view("expense_amount",["id"=>$id,"date"=>$date]);
    }



    public function credit(){
        return view("credit");
    }
    public function credit_form(Request $request){
        $date =$request->post("date");
        income::create(["Date"=>$request->post("date")]);
        $data = income::max("id");
        //dd($data);
        return view("income_amount",["data"=>$data,"date"=>$date]);
    }
    public function income_amount_form(Request $request){
        income_amount::create([
            "Date_id"=>$request->post("date_id"),
            "Date"=>$request->post("date"),
            "Income_source"=>$request->post("income_source"),
            "Amount"=>$request->post("amount")
        ]);
        $data = income::max("id");
        $date = $request->post("date");
        return view("income_amount",["data"=>$data,"date"=>$date]);
    }
    public function earned(){
        $amount = income_amount::sum("Amount");
        return view("earned",["amount"=>$amount]);
    }
    public function spent(){
        $spent = expense_amount::sum("Amount");
        return view("spent",["spent"=>$spent]);
    }
    public function savings(){
        $amount = income_amount::sum("Amount");
        $spent = expense_amount::sum("Amount");
        $saving = $amount-$spent;
        return view("savings",["saving"=>$saving]);
    }
}
