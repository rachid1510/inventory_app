<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsInstallationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_installations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('installation_id')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('details_installations', function($table) {
          $table->foreign('installation_id')->references('id')->on('installations');
          $table->foreign('product_id')->references('id')->on('products');
          $table->foreign('personal_id')->references('id')->on('personals');
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
        Schema::dropIfExists('details_installations');
    }
}
