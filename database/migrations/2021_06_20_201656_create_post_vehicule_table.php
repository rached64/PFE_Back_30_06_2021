<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostVehiculeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_vehicule', function (Blueprint $table) {
            $table->bigIncrements('id', true)->unsigned();
			$table->String('title');
			$table->text('description');
			$table->decimal('price', 17)->unsigned()->nullable();
            $table->string('category');
            
            $table->String('Modele');
            $table->String('BoiteDeVitesse')->nullable();
            $table->string('AnneeModele')->nullable();
            $table->String('Marque')->nullable();
            $table->string('YearOfRegistration')->nullable();
            $table->String('TypePost')->nullable();
            $table->String('PuissanceFiscale')->nullable();
            $table->bigInteger('Kilometrage')->nullable();
            $table->integer('NombreDePortes')->nullable();
            $table->integer('NombreDePlaces')->nullable();
            $table->String('carburant')->nullable();
            $table->string('image');
            $table->string('imagePath');

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
        Schema::dropIfExists('post_vehicule');
    }
}
