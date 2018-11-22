<?php

namespace App;

use App\Empleado;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Una tarea puede estar asignada a uno o muchos empleados
     *
     * @return void
     */
    public function empleados() {
        return $this->belongsToMany(Empleado::class);
    }
}
