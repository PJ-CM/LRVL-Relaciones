<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_proyecto', function (Blueprint $table) {
            $table->integer('empleado_id')->unsigned();
            $table->integer('proyecto_id')->unsigned();
            /*//SIN valor por defecto
            $table->datetime('fechahorainicio');
            $table->datetime('fechahorafin');*/
            //CON valor por defecto
            //  >> de forma aleatoria, con formato 'Y-m-d H:i:s'
            /*$table->datetime('fechahorainicio')->default($this->fechaAleatoria('Y-m-d H:i:s', random_int(0, 100)));
            $table->datetime('fechahorafin')->default($this->fechaAleatoria('Y-m-d H:i:s', random_int(100, 200)));*/
            //  >> a través del método de Laravel
            /*$table->datetime('fechahorainicio')->useCurrent();
            $table->datetime('fechahorafin')->useCurrent();*/
            //  >> a través del complemento Carbon ya incluido en las últimas versiones de Laravel
            $table->datetime('fechahorainicio')->default(Carbon::now())->toDateTimeString();
            $table->datetime('fechahorafin')->default(Carbon::now()->addMonth(4))->toDateTimeString();/**/

            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_proyecto');
    }

    public function fechaAleatoria($formatoFecha = null, $aniadido = null) {
        $timestamp = mt_rand(1, time()) + $aniadido;
        $randomDate = date($formatoFecha, $timestamp);

        return $randomDate;
    }
}
