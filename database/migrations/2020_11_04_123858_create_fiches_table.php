<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->id();
            $table->integer('hauteur');
            $table->integer('poids');
            $table->string('sang');
            $table->date('date');
            $table->integer('temperature');
            $table->boolean('doux');
            $table->boolean('odeur');
            $table->boolean('gout');
            $table->boolean('gorge');
            $table->boolean('diarrhee');
            $table->boolean('fatigue');
            $table->boolean('souffle');
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
        Schema::dropIfExists('fiches');
    }
}
