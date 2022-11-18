<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInalambricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inalambricas', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('router');
            $table->string('conexion');
            $table->string('ssid');
            $table->string('frecuencia');
            $table->string('ancho_de_canal');
            $table->string('modelo');
            $table->string('lugar');
            $table->string('switch');
            $table->string('puerto');
            $table->bigInteger('location_id');
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
        Schema::dropIfExists('inalambricas');
    }
}
