<?php

namespace App;

use App\Empleado;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'titulo', 'fechainicio', 'fechafin', 'horasestimadas', 'empleado_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Un proyecto está dirigido por un empleado
     *
     * @return void
     */
    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }

    /**
     * En un proyecto puede colaborar uno o muchos empleados
     *
     * @return void
     */
    public function empleados() {
        //Devolviendo solo los campos que participan en la relación
        ////return $this->belongsToMany(Empleado::class);
        //Devolviendo los campos indicados además de los campos que participan en la relación
        return $this->belongsToMany(Empleado::class)->withPivot('fechahorainicio', 'fechahorafin');
    }
}
