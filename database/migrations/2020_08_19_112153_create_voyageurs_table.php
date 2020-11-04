<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyageursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyageurs', function (Blueprint $table) {
            $table->id();
            $table->string('nomeV',100);
            $table->string('prenomeV' ,100);
            $table->string(  'dateNV' ,100)->nullable();
            $table->string('lieuNV' ,100)->nullable();
            $table->string('documentV' ,100)->nullable();
            $table->string('numeroV' ,100)->nullable();
            $table->string( 'dateDV',100)->nullable();
            $table->string('dateEV' ,100)->nullable();
            $table->string('adressV' ,100)->nullable();
            $table->string('emailV' ,100)->nullable();
            $table->string( 'mobileV',100);
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
        Schema::dropIfExists('voyageurs');
    }
}
