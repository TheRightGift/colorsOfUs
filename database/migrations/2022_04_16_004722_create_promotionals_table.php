<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotionals', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->text('desc')->nullable();
            $table->string('cover')->nullable();
            $table->integer('discount')->nullable(); //Percent %
            $table->integer('price')->nullable(); //Prices for the new promotional, discount is good, slashes the product price with the discount to get the promo price
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
        Schema::dropIfExists('promotionals');
    }
}
