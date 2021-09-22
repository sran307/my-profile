<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//adding table
use App\Models\Registration_table;
//adding validator
use Illuminate\Support\Facades\Validator;

class Registration extends Controller
{
    public function register(){
        return view("register");
    }
    public function registration_form(Request $request){
        //taking email id and user id from table to check whether it is used or not
        $email=$request->input("email");
        $email_data=Registration_table::where("Email",$email)->get();
        $user_id=$request->input("user_id");
        $user_id_data=Registration_table::where("User_Id",$user_id)->get();
        //validation of ajax
        $validate_data=Validator::make($request->all(),[
            "first_name"=>"required",
            "last_name"=>"required",
            "email"=>"required|email",
            "mobile_number"=>"required|integer|min:10",
            "country"=>"required",
            "gender"=>"required",
            "interest"=>"required",
            "job"=>"required",
            "user_id"=>"required|min:8",
            "password"=>"required",
            "confirm_password"=>"required"
        ]);
        //validation message 
        if($validate_data->fails()){
            return response()->json([
                "status"=>400,
                "errors"=>$validate_data->messages()
            ]);
           
        }else if(count($email_data)>0){
            //checking whether the email id is exist or not
            return response()->json([
                "status"=>200,
                "message"=>"Email id already taken. Try another one.",
                "console"=>count($email_data)
            ]);
        }else if(count($user_id_data)>0){
            //chiecking whether the user id is taken or not
            return response()->json([
                "status"=>201,
                "message"=>"User id already taken. Try another one."
            ]);
        }else if($request->post("password")!=$request->post("confirm_password")){
            //checking password and confirm password are equal or not
            return response()->json([
                "status"=>401,
                "error"=>"passwords are not matching"
            ]);
        }else{
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
        return response()->json([
            "status"=>205,
            "message"=>"Registration successful",
            "url"=>"/home"
        ]);
        }
        
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
    
    //password changing function
    public function change_password(){
        return view("change_password");    
    }
    public function new_password(Request $request){
        //validation 
        $validate_data = $request->validate([
            "password"=>"required",
            "new_password"=>"required",
            "confirm_new_password"=>"required"
        ]);
        //dd(session("login_id"));
        //fetching data from input field
        $password=$request->input("password");
        $new_password=$request->post("new_password");
        $confirm__password=$request->post("confirm_new_password");
        //dd($new_password);
        //checking whether the new and confirm password are same
        //fetch the value from the table for corresponding user_id
        //taking user login id from the session
        $login_id=session("login_id");
        //fetch the value corresponding to the id
        $password_data=Registration_table::where("id",$login_id)->get();
        //dd($password_data);
        //taking password from table
        foreach($password_data as $data){
            $user_password=$data->Password;
        }
        //convert the typed old password into md5
        $enc_password=md5($password);
        //convert the new password into md5
        $new_enc_password=md5($new_password);
        if($new_password!=$confirm__password){
            return back()->with("error_message","new password and confirm password are not same.");
        }else if($user_password == $enc_password){
            //password from table and now typed passwords are equal then modify the table
            DB::beginTransaction();
            try{
                Registration_table::where("id",$login_id)->update(["Password"=>$new_enc_password]);
                DB::commit();
                return redirect("/dashboard")->with("success_message","Passwoord changed successfully");
            }catch(\Exception $e){
                DB::rollback();
                return back()->with("error_message","Cannot change the password");
            }
        }else{
            return back()->with("error_message","your login password is not matching");
        };
    }

        //function for profile page
    public function profile(){
        //object:take the data from the database corresponding to the id that matches login credentials
        //then pass it to the profile page
        //taking user login id from the session
        $login_id=session("login_id");
        //taking data from data base
        $user_data = Registration_table::where("id",$login_id)->get();
        foreach($user_data as $data){
            $name=$data->Name;
            $email=$data->Email;
            $mobile=$data->Mobile_number;
            $gender=$data->Gender;
            $country=$data->Country;
            $interests=$data->Interests;
            $job=$data->Job;
            $user_id=$data->User_Id;
        }
        //decoding json encoded checkbox data
        $interest=json_decode($interests);
        //dd($interest);
        //passing data to the page
        return view("profile",[
            "name"=>$name,
            "email"=>$email,
            "mobile"=>$mobile,
            "gender"=>$gender,
            "country"=>$country,
            "interest"=>$interest,
            "job"=>$job,
            "userId"=>$user_id
        ]);
    }
    

}
