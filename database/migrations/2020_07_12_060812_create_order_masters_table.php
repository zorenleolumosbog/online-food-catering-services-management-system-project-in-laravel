<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_masters', function (Blueprint $table) {
            $table->bigIncrements('order_master_id');
            $table->foreignId('customer_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_mobile');
            $table->text('customer_address');
            $table->float('total_price', 10, 2);
            $table->float('gst');
            $table->foreignId('delivery_boy_id');
            $table->integer('payment_status');
            $table->integer('order_status');
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
        Schema::dropIfExists('order_masters');
    }
}
