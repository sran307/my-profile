<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chitty;

class ForChit extends Controller
{
    public function index(){
        return view("layout");
    }
    public function home(){
        return view("home");
    }

    public function chitty(){
        return view("chitty");
    }

    public function chitty_form(Request $request){
        //dd($request);
        $validate_data = $request -> validate([
            "date" => "required",
            "amount" => "required"
        ]);
        $chitty = chitty::create([
            "Date" => $request->post("date"),
            "Amount" => $request->post("amount")
        ]);
        return back();
    }
    public function chitty_total_amount(){
        $data = chitty::sum("amount");
        return view("chittyTotalAmount",["data"=>$data]);
    }
    public function number_of_months_paid(){
        $TotalNumberOfMonth = chitty::count("Date");
        $NumberOfMonthNotPaid = chitty::where("amount",0)->count("Date");
        $NumberOfMonthPaid = $TotalNumberOfMonth-$NumberOfMonthNotPaid;
        return view("numberOfMonthsPaid",["data1"=>$TotalNumberOfMonth,"data2"=>$NumberOfMonthPaid,"data3"=>$NumberOfMonthNotPaid]);
    }
}
