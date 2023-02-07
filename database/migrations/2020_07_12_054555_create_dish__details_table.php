<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish__details', function (Blueprint $table) {
           $table->bigIncrements('dish__details_id');
           $table->foreignId('dish_id');
           $table->string('attribute');
           $table->float('price', 10 ,2);
           $table->integer('dish__details_status');
           $table->dateTime('added_on');
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
        Schema::dropIfExists('dish__details');
    }
}
