<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_personals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->timestamps();
        });
        Schema::table('inventory_personals', function($table) {
          $table->foreign('personal_id')->references('id')->on('personals');
          $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('inventory_personals');
    }
}
