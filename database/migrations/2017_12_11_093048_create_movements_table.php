<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('provider');
            $table->string('order_ref');
            $table->date('date_arrived');
            $table->string('plan');
            $table->string('observtion');
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
         });

         Schema::table('movements', function($table) {
          $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('movements');
    }
}
