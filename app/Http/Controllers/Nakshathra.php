<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\models\Ncomponent;
use App\models\Ncomponent_pricing;
use App\models\Nwork;

class Nakshathra extends Controller
{
    public function nakshathra(){
        return view("nakshathra");
    }
    public function add_component(){
        
        return view("addComponent");
    }
    public function add_component_form(Request $request){
        //taking all the component 
        $components = Ncomponent::all();
        //dd($components);
        //checking the component present or not 
        //if not present insert the data if present take the data
        $name =$request->post("component_name");        //name of the component entered
        $all_components=[];     //declaring an empty array
        //pushing elements into the array
        foreach($components as $component){
            array_push($all_components,$component->Components);
        }
        //dd($all_components);
        //checking whether the component is present or not
    
        if(in_array($name,$all_components)){
            //if present, take  the id
            //dd($id);
            //for loop is used for iterate and taking the id which is corresponding to the compoent 
            //using an if condition
            foreach($components as $component){
                if($name==$component->Components){
                    //dd($component->id);
                    $id=$component->id;
                }
            }
        }else{
            //if not present, insert the data
            //dd($name);
            Ncomponent::create(["Components"=>$request->post("component_name")]);
            $id=Ncomponent::max("id");
        }
        
        
        return view("addComponentForm",["id"=>$id,"name"=>$name]);
    }
    public function adding_component(Request $request){
        $id = $request->post("component_id");
        $name = $request->post("component_name");
        Ncomponent_pricing::create(["Component_id"=>$id,
            "Component_name"=>$request->post("component_name"),
            "Component_value"=>$request->post("component_value"),
            "Component_rating"=>$request->post("component_rating"),
            "Component_price"=>$request->post("component_price"),
            "No_of_components"=>$request->post("component_quantity")
        ]);
        return view("addComponentForm",["id"=>$id,"name"=>$name]);
    }

    public function customer(){
        $customer_id=Nwork::max("Customer_id");
        $new_id=$customer_id+1;
        

        return view("customer",["new_id"=>$new_id]);
    }
    public function component_for_customer(){
        $name=ncomponent::orderBy("Components","asc")->get();
        return response()->json([
            "name"=>$name,
        ]);
    }
    //taking value of the component with respect to its name
    public function component_value(Request $request){
        $name=$request->post("name");
        $value=ncomponent_pricing::where("Component_name",$name)->get();
        return response()->json([
            "value"=>$value
        ]);
    }
    //taking component rating with respect to name and value
    public function component_rating(Request $request){
        $name=$request->post("name");
        $value=$request->post("value");
        $rating=ncomponent_pricing::where("Component_name",$name)->where("Component_value",$value)->get();
        return response()->json([
            "rating"=>$rating
        ]);
    }
    //taking component price
    public function component_price(Request $request){
        $name=$request->post("name");
        $value=$request->post("value");
        $rating=$request->post("rating");
        $price=ncomponent_pricing::where("Component_name",$name)
                ->where("Component_value",$value)
                ->where("Component_rating",$rating)->get();
        return response()->json([
            "price"=>$price
        ]);
    }
    //adding customer bill to database
    public function adding_customer_bill(Request $request){
        DB::beginTransaction();
        try{
            Nwork::create([
                "Customer_id"=>$request->post("customer_id"),
                "Date"=>$request->post("date"),
                "Customer_name"=>$request->post("customer_name"),
                "Rate"=>$request->post("my_rate"),
                "Component_price"=>$request->post("component_price"),
                "Total_amount"=>$request->post("total_amount"),
                "Amount_got"=>$request->post("amount_got")
            ]);
            DB::commit();
            return response()->json([
                "status"=>200,
                "message"=>"customer bill saved."
            ]);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                "status"=>400,
                "message"=>"Cannot save customer bill."
            ]);
        }
    }
    public function salary(Request $request){
        Nwork::create(["Customer_id"=>$request->post("customer_id"),
            "Date"=>$request->post("date"),
            "Customer_name"=>$request->post("customer_name"),
            "Component_price"=>$request->post("component_price"),
            "Rate"=>$request->post("rate"),
            "Total_amount"=>$request->post("total_amount"),
            "Amount_got"=>$request->post("amount_got")
        ]);
        return redirect(route("nakshathra"));
    }

    public function profit(){
        $amount_got = Nwork::sum("Amount_got");
        $component_price =Nwork::sum("Component_price");
        $profit = $amount_got-$component_price;
        return view("profit",["profit"=>$profit]);
    }
    public function update_salary(){
        return view("update_salary");
    }
    public function update_amount(Request $request){
        $id = $request->post("customer_id");
        $amount =$request->post("amount");
        Nwork::where("Customer_id",$id)->update(["Amount_got"=>$amount]);
        return redirect(route("nakshathra"));
    }
    public function update_component(){
        $data = Ncomponent::all();
        return view("updateComponent",["data"=>$data]);
    }
    public function component_update_form(Request $request){
        $name =$request->post("component_name");
        $value1 =$request->post("component_value");
        $quantity= $request->post("component_quantity");
        $price= $request->post("component_price");
        $data=Ncomponent_pricing::where("Component_name",$name)->get();
        foreach($data as $value){
            $component_value=$value->Component_value;
            $component_price=$value->Component_price;
            $component_quantity=$value->Quantity;
        }
        $total_quantity=$component_quantity+$quantity;
        if($value1==$component_value){
            DB::beginTransaction();
            try{
                Ncomponent_pricing::where("Component_value",$value1)->update(["Quantity"=>$total_quantity]);
            DB::commit();
            }catch(\Exception $e){
                DB::rollback();
            }
            if($price>$component_price){
                DB::beginTransaction();
                try{
                    Ncomponent_pricing::where("Component_value",$value1)->update(["Component_price"=>$price]);
                DB::commit();
                }catch(\Exception $e){
                    DB::rollback();
                }
            }
            return redirect(route("nakshathra"))->with("success_message","Component Updated");
        }else{
            return redirect(route("nakshathra"))->with("error_message","Cannot update component");   
        }
    }
    public function used_component(){
        $data = Ncomponent::all();
        return view("used_component",["data"=>$data]);
    }
    public function used_component_form(Request $request){
        $name =$request->post("component_name");
        $value1 =$request->post("component_value");
        $quantity= $request->post("used_quantity");
        $rating= $request->post("component_rating");
        $data=Ncomponent_pricing::where("Component_name",$name)->get();
        foreach($data as $value){
            $component_value=$value->Component_value;
            $component_used=$value->Components_used;
            $component_quantity=$value->Quantity;
            $component_rating=$value->Component_rating;
        }
        $available=$component_quantity-$component_used;
        if($quantity>$available){
            return back()->with("error_message","Entered limit is over than available");
        }else{
            $used_quantity=$component_used+$quantity;
            if($value1==$component_value and $rating==$component_rating){
                DB::beginTransaction();
                try{
                    Ncomponent_pricing::where("Component_value",$value1)->update(["Components_used"=>$used_quantity]);
                DB::commit();
                }catch(\Exception $e){
                    DB::rollback();
                }
                return redirect(route("nakshathra"))->with("success_message","Used quantity updated");
            }else{
                return back()->with("error_message","Component value or rating is not matching");
            }
        }
        
        if($value1==$component_value){
            
            if($price>$component_price){
                DB::beginTransaction();
                try{
                    Ncomponent_pricing::where("Component_value",$value1)->update(["Component_price"=>$price]);
                DB::commit();
                }catch(\Exception $e){
                    DB::rollback();
                }
            }
            return redirect(route("nakshathra"))->with("success_message","Component Updated");
        }else{
            return redirect(route("nakshathra"))->with("error_message","Cannot update component");   
        }
    }
    public function components_available(){
        $data = Ncomponent::orderBy("Components","asc")->get();
        return view("components_available",["data"=>$data]);
    }
    //checking available number of items
    public function check_availability(Request $request){
        $name =$request->post("component_name");
       
        $data=Ncomponent_pricing::where("Component_name",$name)->get();
        foreach($data as $value){
            $component_value=$value->Component_value;
            $component_used=$value->Components_used;
            $component_quantity=$value->Quantity;
            $component_rating=$value->Component_rating;
            $component_price="Price is :".$value->Component_price;
        }
        return response()->json([
            //passing data to the js file 
            "data"=>$data,
        ]);
    }
    public function assets(){
        $data=Ncomponent_pricing::all();
        $sum=0;
        foreach($data as $value){
            $price=$value->Component_price;
            $total_quantity=$value->Quantity;
            $used_quantity=$value->Components_used;
            $sum=$sum+(($price*$total_quantity)-($price*$used_quantity));
        }
        return view("amount_of_asset",["asset_amount"=>$sum]);
    }
    public function customer_name(){
        $customers=Nwork::all();
        $sum_total=Nwork::sum("Total_amount");
        $amount_got = Nwork::sum("Amount_got");
        
        return response()->json(["customer"=>$customers,
                                "sum_total"=>$sum_total,
                                "amount_got"=>$amount_got]);
    }
    public function update($id){
        $customer=Nwork::find($id);
        if($customer){
            return response()->json([
                "customer"=>$customer
            ]);
        }
    }
    public function update_fees(Request $request,$id){
        $amount_from_table=Nwork::where("Customer_id",$id)->get();
        foreach($amount_from_table as $amount){
            $amount_in_table=$amount->Amount_got;
        }
        $validator =Validator::make($request->all(),[
            "amount_got"=>"required|integer"
        ]);
        if($validator->fails()){
            return response()->json([
                "status"=>400,
                "errors"=>$validator->messages()
            ]);
        }else{
            $price =$request->input("amount_got");
            $update_amount=$amount_in_table+$price;
            Nwork::where("Customer_id",$id)->update(["Amount_got"=>$update_amount]);
            return response()->json([
                "status"=>200,
                "message"=>"success: amount updated."
            ]);
        }
        
        //$customer->Amount_got=$request->input("Amount_got");
        //$customer->update();
        
    }
    //updating component for that take the value from the table and show it on the modal
    public function update_component_modal($id){
        $data = ncomponent_pricing::where("id",$id)->get();
        return response()->json([
            "data"=>$data
        ]);
    }
    //new content is updating to the table
    public function update_to_table(Request $request){
        //assigning values to variable
        $id=$request->input("id");
        $name=$request->input("name");
        $rating=$request->input("rating");
        $price=$request->input("price");
        $value=$request->input("value");
        $available=$request->input("available");
        //update with corresponding id and name
        DB::beginTransaction();
        try{
            Ncomponent_pricing::where([
                ["id","=",$id],
                ["Component_name","=",$name]
                ])->update([
                    "Component_price"=>$price,
                    "Component_value"=>$value,
                    "Component_rating"=>$rating,
                    "No_of_components"=>$available
                ]);
        DB::commit();
        return response()->json([
            "status"=>200,
            "message"=>"components updated"
        ]);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                "status"=>400,
                "message"=>"Cannot update the components"
            ]);

        }

    }
    //used component update function
    public function component_taken(Request $request){
        $id=$request->input("id");
        $no_of_taken=$request->input("no_used");
        $data=Ncomponent_pricing::where("id",$id)->get();
        foreach($data as $value){
            $available=$value->No_of_components;
        }
        //condition checking
        // 1. whether the number of taken less or grater. if greater try exception
        if($no_of_taken>$available){
            return response()->json([
                "status"=>400,
                "message"=>"Sorry, that much of component is not available"
            ]);
        }else{
            //update component available table
            $remaining=$available-$no_of_taken;
            DB::beginTransaction();
            try{
                Ncomponent_pricing::where("id",$id)->update(["No_of_components"=>$remaining]);
                DB::commit();
                return response()->json([
                    "status"=>200,
                    "message"=>"availability added"
                ]);
            }catch(\Exception $e){
                DB::rollback();
                return response()->json([
                    "status"=>400,
                    "message"=>"Cannot finish the updation"
                ]);
            }
        }
    }
    public function asset(){
        return view("assets");
    }

}
