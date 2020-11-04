<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('nationalite',100);
            $table->string('payeV',100);
            $table->BigInteger('typeVisa')->unsigned();
            $table->foreign('typeVisa')->references('id')->on('visas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('dateA',100);
            $table->string('status',100)->default("en attente");
            $table->BigInteger('NomV')->unsigned();
            $table->foreign('NomV')->references('id')->on('voyageurs');
            $table->BigInteger('nomA')->unsigned();
            $table->foreign('nomA')->references('id')->on('agences')->onDelete('cascade');
            $table->string('cause',100)->nullable();
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
        Schema::dropIfExists('demandes');
    }
}
