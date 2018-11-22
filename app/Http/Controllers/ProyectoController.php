<?php

namespace App\Http\Controllers;

use App\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    protected $valores_tipo = 'proyecto';

    public function index ()
    {
        //SIN Paginación :: sacando todos los regisrtos seguidos en la misma página
        ////$valores = Proyecto::all();
        //CON Paginación :: sacando X regisrtos en cada página
        $valores = Proyecto::paginate(5);

        return view ('proyectos.index')->with([
            'valores_tipo' => $this->valores_tipo,
            'valores' => $valores,
            'valoresTOT' => count($valores),
            //'accion' => $accion,
        ]);
    }

    public function get ($id)
    {
        $_arr_detalle = [];

        $valor = Proyecto::findOrFail($id);
        $_arr_detalle['valor'] = $valor;

        return view ('proyectos.proyecto')->with($_arr_detalle);
    }

}
