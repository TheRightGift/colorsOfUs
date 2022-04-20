<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippinginfoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippinginfo_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shippinginfo_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('primary',[1, 0])->default(0);
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
        Schema::dropIfExists('shippinginfo_user');
    }
}
