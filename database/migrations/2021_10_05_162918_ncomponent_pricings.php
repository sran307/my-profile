<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NcomponentPricings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ncomponent_pricings', function (Blueprint $table) {
            $table->renameColumn('No_of_components', 'Quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('ncomponent_pricings', function (Blueprint $table) {
            $table->renameColumn('Quantity', 'No_of_components');
        });
    }
}
