<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('agence')->unsigned();
            $table->foreign('agence')->references('id')->on('agences')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name',100);
            $table->string('prenome',100);
            $table->string('email',100)->unique();
            $table->string('mobile',100);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->Integer('type')->default('0');
            $table->string('etat',50)->default('demande');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
