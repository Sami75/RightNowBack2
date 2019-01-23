<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validation', function (Blueprint $table) {
            $table->integer('demande_id')->unsigned();
            $table->foreign('demande_id')->references('id')->on('demande');
            $table->integer('jobbeur_id')->unsigned();
            $table->foreign('jobbeur_id')->references('id')->on('users');
            $table->primary(array('demande_id', 'jobbeur_id'));
            $table->integer('status')->default('0');            
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
        Schema::dropIfExists('validation');
    }
}
