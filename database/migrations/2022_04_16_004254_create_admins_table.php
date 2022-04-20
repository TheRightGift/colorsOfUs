<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('othername')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->unsignedBigInteger('state');
            $table->string('username')->nullable();
            $table->enum('gender', ['M', 'F']);
            $table->string('profile_img')->nullable();
            $table->unsignedBigInteger('lga');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('admins');
    }
}
