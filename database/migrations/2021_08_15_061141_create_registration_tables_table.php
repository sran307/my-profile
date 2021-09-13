<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_tables', function (Blueprint $table) {
            $table->id();
            $table->string("Name");
            $table->string("Email");
            $table->integer("Mobile_number");
            $table->string("Country");
            $table->string("Gender");
            $table->string("Interests");
            $table->string("Job");
            $table->string("User_Id");
            $table->string("Password");
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
        Schema::dropIfExists('registration_tables');
    }
}
