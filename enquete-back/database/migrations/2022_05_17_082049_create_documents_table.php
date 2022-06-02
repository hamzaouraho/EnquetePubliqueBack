<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->nullable(false);
            $table->string('typeDoc')->nullable(false);
            $table->string('intitule')->nullable(false);
            $table->string('dateDebut')->nullable(false);
            $table->string('commune')->nullable(false);
            $table->string('agenceUrba')->nullable(false);
            $table->text('pictureUrl')->nullable(false);
            $table->text('perimetre')->nullable(false);
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
        Schema::dropIfExists('documents');
    }
}
