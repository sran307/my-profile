<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//adding table
use App\Models\Registration_table;

class Registration extends Controller
{
    public function register(){
        return view("register");
    }
    public function registration_form(Request $request){
        //validation
        $validate_data=$request->validate([
            "first_name"=>"required",
            "last_name"=>"required",
            "email"=>"required",
            "mobile_number"=>"required",
            "country"=>"required",
            "gender"=>"required",
            "interest"=>"required",
            "job"=>"required",
            "user_id"=>"required",
            "password"=>"required",
            "confirm_password"=>"required"
        ]);
        //concatenate first and last name 
        $name=$request->post("first_name")." ".$request->post("last_name");
        //interst changed into json
        $interests = $request->post("interest");
        $user_interest=json_encode($interests);
        //password encrypting
        $password=$request->post("password");
        $enc_password=md5($password);
        //mass assign data
        //error handling
        DB::beginTransaction();
        try{
            $data=Registration_table::create([
                "Name"=>$name,
                "Email"=>$request->post("email"),
                "Mobile_number"=>$request->post("mobile_number"),
                "Country"=>$request->post("country"),
                "Gender"=>$request->post("gender"),
                "Interests"=>$user_interest,
                "Job"=>$request->post("job"),
                "User_Id"=>$request->post("user_id"),
                "Password"=>$enc_password
            ]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect(route("home"))->with("success_message","Registration Successful");
    }

    public function login(){
        return view("login");
    }
    public function login_form(Request $request){
        $user_id_or_email=$request->post("user_id");
        $password=$request->post("password");
        //encrypting password because, in the table the password is in encrypted format
        $enc_password=md5($password);
        $user=Registration_table::where("Email",$user_id_or_email)->orWhere("User_Id",$user_id_or_email)->get();
        foreach($user as $data){
            $user_password=$data->Password;
            $id=$data->id;
        }
        if(!$user->isEmpty()){
            if($enc_password==$user_password){
                $request->session()->put("login_id",$id);
                return view("dashboard");
            }else{
                return back()->with("error_message","Password is incorrect.");
            }
        }else{
            return back()->with("error_message","User id or Email is not present.Please register");
        }
    }

    public function logout(){
        if(session()->has("login_id")){
            session()->pull("login_id");
        }
        return redirect(route("home"))->with("success_message","You are successfully logged out");
    }

    public function dashboard(){
        return view("dashboard");
    }
    public function check_register(Request $request){
        $email=$request->input("email");
        $user_id=$request->input("user_id");
        if(Registration_table::where("Email",$email)->get()){
            return response()->json([
                "status"=>200,
                "message"=>"Email id already taken. Try another one."
            ]);
        }
        if(Registration_table::where("User_Id",$user_id)->get()){
            return response()->json([
                "status"=>201,
                "message"=>"User id already taken. Try another one."
            ]);
        }
    }


}
