<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVietasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vietas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nosaukums');
            $table->string('valsts');
            $table->string('pilseta');
            $table->string('iela');
            $table->string('pasta_kods');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('vietas');
    }
}
