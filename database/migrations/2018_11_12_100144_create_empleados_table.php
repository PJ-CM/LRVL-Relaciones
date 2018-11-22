<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('email');
            $table->string('telefono');
            $table->integer('departamento_id')->unsigned();
            $table->timestamps();

            //Indicando que se añade una clave foránea referida
            //al campo 'id' de la otra tabla 'departamentos'
            $table->foreign('departamento_id')->references('id')->on('departamentos');

            /**
             * Podría hacer falta si el campo puede ser NULO:
             *      $table->integer('nombre_campo')->->nullable()->unsigned();
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
