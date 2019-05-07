<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParvadajumiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parvadajumi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('iekrausanas_datums');
            $table->date('izkrausanas_datums');
            $table->time('iekrausanas_laiks');
            $table->time('izkrausanas_laiks');
            $table->integer('iekrausanas_vieta_id')->unsigned(); //tiek nemts no vietas tabulas
            $table->integer('izkrausanas_vieta_id')->unsigned(); //tiek nemts no vietas tabulas
            $table->integer('klients_id')->unsigned(); //tiek nemts no kompanijas tabulas
            $table->integer('parvadatajs_id')->unsigned(); //tiek nemts no kompanijas tabulas
            $table->integer('ienemumi');
            $table->integer('izmaksas');
            $table->integer('pelna');
            $table->text('transporta_numuri');
            $table->text('kravas_apraksts');
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
        Schema::dropIfExists('parvadajumi');
    }
}
