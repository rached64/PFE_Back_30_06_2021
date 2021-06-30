<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pro', function (Blueprint $table) {
            $table->bigIncrements('id', true)->unsigned();
            $table->string('nom');
			$table->string('email');
            $table->string('password');
            $table->integer('telephone');
            $table->binary('picture');
            $table->bigInteger('SIERT');
            $table->string('NomSociete');
            $table->string('catActivite');
            $table->string('Adresse');
            $table->string('codePostal');
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
        Schema::dropIfExists('user_pro');
    }
}
