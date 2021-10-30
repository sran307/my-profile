<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\mutual;

class Assets extends Controller
{
    public function stocks(){
        return view("asset");
    }
    public function mutual_fund(){
        return view("mutual_fund");
    }
    public function add_mf_data(Request $request){
        $validator=Validator::make($request->all(),[
            "name"=>"required",
            "date"=>"required",
            "amount"=>"required|integer"
        ]);
        if($validator->fails()){
            return response()->json([
                "status"=>400,
                "errors"=>$validator->messages()
            ]);
        }else{
            mutual::create([
                "Name"=>$request->post("name"),
                "Date"=>$request->post("date"),
                "Type"=>$request->post("type"),
                "Amount"=>$request->post("amount")
            ]);
            return response()->json([
                "message"=>"success:mutual fund addedd",
            ]);
        }
       
    }
    public function fetch_mutual_fund(){
        $mutual_funds=mutual::all();
        $fund_value=mutual::sum("Amount");
        return response()->json([
            "mutual_funds"=>$mutual_funds,
            "fund_value"=>$fund_value
        ]);
    }
    public function get_mutual_fund($id){
        $mutual_funds=mutual::find($id);
        return response()->json([
            "mutual_funds"=>$mutual_funds
        ]);
    }
    public function updating_amount(Request $request){
        $name=$request->input("name");
        $amount=$request->input("amount");
        $datas=mutual::where("Name",$name)->get();
        foreach ($datas as $data){
            $amount_from=$data->Amount;
        }
        $updating_amount_is=$amount_from+$amount;
        if(mutual::where("Name",$name)->update(["Amount"=>$updating_amount_is])){
            return response()->json([
                "status"=>200,
                "message"=>"success: amount updated."
            ]);
        }else if(!mutual::where("Name",$name)->update(["Amount"=>$updating_amount_is])){
            return response()->json([
                "status"=>400,
                "error"=>"failed:updation failed"
            ]);
        }
        
    }
    public function delete_mutual($id){
        mutual::where("id",$id)->delete();
        return response()->json([
            "message"=>"sucess: mutual fund deleted."
        ]);
    }

    public function stock_names(){
        return view("stock_names");
    }
}
