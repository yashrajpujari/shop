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
            $table->integer('order_increment_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('name',300);
            $table->string('email',300);
            $table->string('phone',300);
            $table->text('address');
            $table->text('address2');
            $table->string('city',300);
            $table->string('state',300);
            $table->string('country',300);
            $table->string('pincode',300);
            $table->decimal('subtotal');
            $table->string('coupan')->nullable();
            $table->decimal('coupan_discount',8,2)->nullabel();
            $table->decimal('total');
            $table->float('shipping_cost');
            $table->string('payment_method');
            $table->string('shipping_method');
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
