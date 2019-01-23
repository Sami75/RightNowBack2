<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('mail')->unique();
            $table->string('password');
            $table->integer('numRue')->nullable();
            $table->string('adresse')->nullable();
            $table->integer('cdp')->nullable();
            $table->string('ville')->nullable();
            $table->string('sexe')->nullable();
            $table->integer('telephone');
            $table->integer('noteDemande');
            $table->integer('noteJobeur');
            $table->boolean('annulationDemande');
            $table->boolean('annulationJobeur');
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
        Schema::dropIfExists('users');
    }
}
