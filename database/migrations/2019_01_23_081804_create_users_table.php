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
            $table->string('adresse')->nullable();
            $table->integer('cdp')->nullable();
            $table->string('ville')->nullable();
            $table->string('sexe')->nullable();
            $table->integer('telephone');
            $table->integer('noteDemande')->default(5);
            $table->integer('noteJobeur')->default(5);
            $table->boolean('annulationDemande')->default(1);
            $table->boolean('annulationJobeur')->default(1);
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
