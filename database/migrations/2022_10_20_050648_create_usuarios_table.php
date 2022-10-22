<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 128)->nullable();
            $table->string('email', 256)->nullable();
            $table->timestamps();
            $table->unique(['email'], 'pk_usuarios');
        });
    }
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}