@extends('layouts.default')

@section('title', 'UD5. ORM')

@section('content')

    <div><a href="{{ route('proyectos') }}" title="Ir al listado anterior">Volver al listado</a></div>

    <h2>Proyecto: {{ $valor->nombre }}</h2>
    <h3>Titulo: {{ $valor->titulo }}</h3>
    <h3>Responsable: <a href="{{ route('empleado', ['id' => $valor->empleado->id]) }}" title="Ver detalle del responsable">{{ $valor->empleado->nombre . ' ' . $valor->empleado->apellido1 . ' ' . $valor->empleado->apellido2 }}</a></h3>

    @if (count($valor->empleados) == 0)

    <h3>Este proyecto no tiene colaboradores.</h3>

    @else

    <h3>Colaboradores:</h3>
    <h4>Hay [<strong>{{ count($valor->empleados) }}</strong>] colaborador(es) disponible(s):</h4>
    {{--
        SIN MOSTRAR LOS CAMPOS DE FECHA DE LA TABLA PIVOTE
        ======================================================================
    --}}
    {{--
    <ul>
    @foreach ($valor->empleados as $empleado)
        <li>
            <a href="{{ route('empleado', ['id' => $empleado->id]) }}" title="Ver detalle del colaborador">{{ $empleado->nombre . ' ' . $empleado->apellido1 . ' ' . $empleado->apellido2 . '.' }}</a>
        </li>
    @endforeach
    </ul>--}}
    {{--
        MOSTRANDO LOS CAMPOS DE FECHA DE LA TABLA PIVOTE
        ======================================================================
    --}}
    <table style="border: 1px solid black;">
        <tr>
            <th>Nombre Completo</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
        </tr>
    @foreach ($valor->empleados as $empleado)
        <tr>
            <td style="border: 1px solid black; padding: 5px;"><a href="{{ route('empleado', ['id' => $empleado->id]) }}" title="Ver detalle del colaborador">{{ $empleado->nombre . ' ' . $empleado->apellido1 . ' ' . $empleado->apellido2 . '.' }}</a></td>
            <td style="border: 1px solid black; padding: 5px; text-align: center;">@php
                echo date('d/m/Y', strtotime($empleado->pivot->fechahorainicio));
            @endphp{{-- $empleado->pivot->fechahorainicio --}}</td>
            <td style="border: 1px solid black; padding: 5px; text-align: center;">@php
                    echo date('d/m/Y', strtotime($empleado->pivot->fechahorafin));
                @endphp{{-- $empleado->pivot->fechahorafin --}}</td>
        </tr>
    @endforeach
    @endif
    </table>

@endsection
