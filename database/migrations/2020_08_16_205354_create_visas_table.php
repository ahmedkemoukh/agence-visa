<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('payev',50);
            $table->foreign('payev')->references('paye')->on('distinations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('typevisa',50);
            $table->bigInteger('tarifv');
            $table->string('disponibilitev',50);
            $table->string('remboursablev',50);
            $table->string('tarifvn',50)->nullable();
            $table->string('date',50)->nullable();
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
        Schema::dropIfExists('visas');
    }
}
