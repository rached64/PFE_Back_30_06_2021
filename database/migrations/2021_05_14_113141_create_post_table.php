<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('id', true)->unsigned();
			$table->String('title');
			$table->text('description');
			$table->decimal('price', 17)->unsigned()->nullable();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
  
            $table->string('picture');
            $table->String('slug', 150)->nullable()->index('slug');
            $table->integer('post_type_id')->unsigned();
	     	$table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('post');
    }
}
