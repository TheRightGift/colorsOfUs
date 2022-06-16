<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('shippinginfo_id');
            $table->integer('quantity');
            $table->enum('status', [0, 1, 2])->default(0);
            $table->string('orderID');
            $table->integer('unit_price');
            $table->integer('discount')->nullable();
            $table->integer('is_finished')->nullable();
            $table->integer('time_to_finish_customized')->nullable();
            $table->enum('is_customized', [0, 1])->default(0);
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
