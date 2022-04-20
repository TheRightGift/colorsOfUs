<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippinginfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippinginfos', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('othername')->nullable();
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->integer('postal_code')->nullable();
            $table->unsignedBigInteger('lga');
            $table->unsignedBigInteger('state');
            $table->unsignedBigInteger('city')->nullable();
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
        Schema::dropIfExists('shippinginfos');
    }
}
