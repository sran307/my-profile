<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_amounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("Date_id")->constrained("incomes");
            $table->date("Date");
            $table->string("Income_source");
            $table->integer("Amount");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income_amounts');
    }
}
