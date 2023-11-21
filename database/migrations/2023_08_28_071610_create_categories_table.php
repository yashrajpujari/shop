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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('parent_category');
            $table->string('name');
            $table->integer('status');
            $table->integer('show_in_menu');
            $table->text('shortDescription');
            $table->text('Description');
            $table->string('meta_teg');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('url_key');
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
        Schema::dropIfExists('categories');
    }
};
