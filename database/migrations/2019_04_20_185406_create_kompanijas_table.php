<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKompanijasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kompanijas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nosaukums');
            $table->string('valsts');
            $table->string('pilseta');
            $table->string('iela');
            $table->string('pasta_kods');
            $table->string('reg_numurs');
            $table->string('pvn_numurs');
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
        Schema::dropIfExists('kompanijas');
    }
}
