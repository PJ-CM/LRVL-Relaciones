<?php

namespace App\Http\Controllers;

use App\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    protected $valores_tipo = 'tarea';

    public function index ()
    {
        //SIN Paginación :: sacando todos los regisrtos seguidos en la misma página
        ////$valores = Tarea::all();
        //CON Paginación :: sacando X regisrtos en cada página
        $valores = Tarea::paginate(15);

        return view ('tareas.index')->with([
            'valores_tipo' => $this->valores_tipo,
            'valores' => $valores,
            'valoresTOT' => count($valores),
            //'accion' => $accion,
        ]);
    }

    public function get ($id)
    {
        $_arr_detalle = [];

        $valor = Tarea::findOrFail($id);
        $_arr_detalle['valor'] = $valor;

        return view ('tareas.tarea')->with($_arr_detalle);
    }
}
