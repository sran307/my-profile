<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNcomponentPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncomponent_pricings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("Component_id")->constrained("Ncomponents");
            $table->string("Component_name",100);
            $table->string("Component_value",100);
            $table->string("Component_rating",100);
            $table->integer("Component_price");
            $table->integer("No_of_components");
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
        Schema::dropIfExists('ncomponent_pricings');
        
    }
}
