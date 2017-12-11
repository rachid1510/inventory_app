<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imei_product');
            $table->string('label');
            $table->enum('state', ['enabled', 'disabled']);
            $table->enum('status', ['0', '1','2']);
            $table->integer('movement_id')->unsigned();
            $table->string('observtion');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('products', function($table) {
          $table->foreign('movement_id')->references('id')->on('movements');
          $table->foreign('user_id')->references('id')->on('users');
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
}
