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
            $table->string('Name');
            $table->integer('Status');
            $table->integer('Is_Featured');
            $table->string('Sku');
            $table->integer('Qty');
            $table->string('Stock_Status');
            $table->decimal('Weight');
            $table->integer('Price');
            $table->integer('Special_Price')->nullable();
            $table->text('Short_Description');
            $table->string('Meta_Tag');
            $table->string('Meta_title');
            $table->string('Meta_Description');
            $table->string('url_key');
            $table->text('Description');
            $table->string('Related_Products')->nullable();
            $table->date('Special_price_from')->nullable();
            $table->date('Special_price_to')->nullable();
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
