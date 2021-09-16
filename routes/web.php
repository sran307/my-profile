<?php

use Illuminate\Support\Facades\Route;

use App\Http\controllers\ForChit;

use App\Http\controllers\ForLoan;

use App\Http\controllers\Budget;

use App\Http\controllers\Nakshathra;
use App\http\Controllers\registration;
use App\Http\Controllers\Assets;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[ForChit::class,"index"]);
Route::get("/",[ForChit::class,"home"]);
Route::get("/home",[ForChit::class,"home"])->name("home");
Route::get("/chitty",[ForChit::class,"chitty"]);
Route::post("/chitty_form",[ForChit::class,"chitty_form"]);
Route::get("/chitty_total_amount",[ForChit::class,"chitty_total_amount"]);
Route::get("/number_of_months_paid",[ForChit::class,"number_of_months_paid"]);

//registration
//create a new controller and a model for registration
Route::get("/register",[Registration::class,"register"]);
Route::post("/registration_form",[Registration::class,"registration_form"]);
Route::get("/login",[Registration::class,"login"]);
Route::post("/login_form",[Registration::class,"login_form"]);
Route::get("/logout",[Registration::class,"logout"]);
Route::get("/dashboard",[Registration::class,"dashboard"]);
Route::get("/change_password",[Registration::class,"change_password"]);
Route::post("/new_password",[Registration::class,"new_password"]);


Route::get("/loan",[ForLoan::class,"loan"]);
Route::post("/loan_form",[ForLoan::class,"loanForm"]);
Route::get("/loan_amount",[ForLoan::class,"loan_amount"]);

#budget is a conotroller for earnings and expenses
Route::get("/expense",[Budget::class,"expense"]);
Route::post("/expense_form",[Budget::class,"expense_form"]);
Route::post("/expense_amount_form",[Budget::class,"expense_amount_form"]);

Route::get("/credit",[Budget::class,"credit"]);
Route::post("/credit_form",[Budget::class,"credit_form"]);
Route::post("/income_amount_form",[Budget::class,"income_amount_form"]);

Route::get("/earned",[Budget::class,"earned"]);
Route::get("spent",[Budget::class,"spent"]);
Route::get("/savings",[Budget::class,"savings"]);

#Nakshathra
Route::get("/nakshathra",[Nakshathra::class,"nakshathra"])->name("nakshathra");
Route::get("/add_component",[Nakshathra::class,"add_component"]);
Route::post("/add_component_form",[Nakshathra::class,"add_component_form"]);
Route::post("/adding_component",[Nakshathra::class,"adding_component"]);
Route::get("/customer",[Nakshathra::class,"customer"]);
Route::post("/salary",[Nakshathra::class,"salary"]);
Route::get("/customer_name",[Nakshathra::class,"customer_name"]);
Route::get("/update_data/{id}",[Nakshathra::class,"update"]);
Route::put("/update_fees/{id}",[Nakshathra::class,"update_fees"]);


#operations
Route::get("/profit",[Nakshathra::class,"profit"]);
Route::get("/update_salary",[Nakshathra::class,"update_salary"]);
Route::post("/update_amount",[Nakshathra::class,"update_amount"]);
Route::get("/update_component",[Nakshathra::class,"update_component"]);
Route::post("component_update_form",[Nakshathra::class,"component_update_form"]);
Route::get("/used_component",[Nakshathra::class,"used_component"])->name("used_component");
Route::post("used_component_form",[Nakshathra::class,"used_component_form"]);
Route::get("/availability",[Nakshathra::class,"components_available"])->name("components_available");
Route::post("/check_availability",[Nakshathra::class,"check_availability"]);
Route::get("/asset",[Nakshathra::class,"assets"]);

#stock and mutual fund controller
Route::get("/stocks",[Assets::class,"stocks"]);
Route::get("/mutual_fund",[Assets::class,"mutual_fund"]);
Route::post("/add_mf_data",[Assets::class,"add_mf_data"]);
Route::get("/fetch_mutual_fund",[Assets::class,"fetch_mutual_fund"]);
Route::get("/get_mutual_fund/{id}",[Assets::class,"get_mutual_fund"]);
Route::put("/updating_amount",[Assets::class,"updating_amount"]);
Route::delete("/delete_mutual/{id}",[Assets::class,"delete_mutual"]);