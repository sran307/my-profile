<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavailablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navailables', function (Blueprint $table) {
            $table->id();
            $table->foreignId("Quantity_id")->constrained("Ncomponent_pricings");
            $table->integer("Purchased");
            $table->integer("Used");
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
        Schema::dropIfExists('navailables');
    }
}
