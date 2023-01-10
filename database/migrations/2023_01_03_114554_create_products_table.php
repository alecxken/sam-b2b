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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->string('banner')->nullable();
            $table->string('product_name')->nullable();
             $table->text('product_desc')->nullable();
            $table->string('sell_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('buy_price')->nullable();
            $table->string('photos')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('products');
    }
};
