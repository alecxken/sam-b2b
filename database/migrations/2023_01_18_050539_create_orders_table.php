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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
              $table->string('_token');
            $table->string('order_by')->nullable();
            $table->string('cart_ref')->nullable();
            $table->string('short_desc')->nullable();
            $table->text('qty')->nullable();
            $table->string('total')->nullable();
            $table->string('payment_ref')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('delivery_status')->nullable();
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
};
