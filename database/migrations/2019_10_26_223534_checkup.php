<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Checkup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->foreign('user_id')->references('id')->on('users');
            $table->dateTime('data_checkup');
            $table->float('peso');
            $table->float('altura');
            $table->text('pressao_arterial');
            $table->Integer('nivel_glicose');
            $table->float('colesterol_LDL');
            $table->float('colesterol_HDL');
            $table->text('observacoes');
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
        Schema::dropIfExists('checkups');
    }
}
