<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nworks', function (Blueprint $table) {
            $table->id();
            $table->date("Date");
            $table->string("Customer_name");
            $table->float("Component_price");
            $table->integer("Rate");
            $table->float("Total_amount");
            $table->float("Amount_got");
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
        Schema::dropIfExists('nworks');
    }
}
