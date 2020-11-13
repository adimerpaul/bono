<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('madres', function (Blueprint $table) {
            $table->id();
            $table->string('paterno');
            $table->string('materno')->nullable();
            $table->string('conyugue')->nullable();
            $table->string('nombres');
            $table->date('fechanac');
            $table->string('ci');
            $table->string('fijo')->nullable();
            $table->string('celular')->nullable();
            $table->string('salario');
            $table->string('afp');
            $table->string('rentista');
            $table->string('juana');
            $table->string('discapacidad');
            $table->string('estado')->default('SIN VERIFICAR');
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
        Schema::dropIfExists('madres');
    }
}
