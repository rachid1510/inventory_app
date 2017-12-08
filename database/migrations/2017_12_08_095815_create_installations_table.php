<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installations', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['In_progress', 'Completed']);
            $table->integer('personal_id')->unsigned();
            $table->integer('costumer_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->foreign('costumer_id')->references('id')->on('costumers');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->dateTime('installed_at');
            $table->string('observation');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('installations');
    }
}
