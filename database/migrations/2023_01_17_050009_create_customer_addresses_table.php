<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();


            $table->string('_token');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('apartment')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('order')->nullable();
            $table->string('total')->nullable();
            $table->string('radio')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('customer_addresses');
    }
};
