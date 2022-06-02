<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requetes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable(false);
            $table->string('tf')->nullable(false);
            $table->string('page')->nullable(false);
            $table->text('commentaire')->nullable(false);
            $table->text('situation')->nullable(false);
            $table->text('image')->nullable(false);
            $table->integer('etudeId')->nullable(false);
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
        Schema::dropIfExists('requetes');
    }
}
