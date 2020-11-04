<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agences', function (Blueprint $table) {
            $table->id()->unique()->unsigned();

            $table->string('nome',100);
            $table->string('addresse',100);
            $table->string('email1',100);
            $table->string('ville',100);
            $table->string('codPosta');
            $table->string('etatA')->default('-1');
            $table->string('mobile1',100);
            $table->string('telephone',100);
            $table->bigInteger("sold")->default('100000000');


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
        Schema::dropIfExists('agences');
    }
}
