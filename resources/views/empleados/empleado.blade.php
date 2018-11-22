@extends('layouts.default')

@section('title', 'UD5. ORM')

@section('content')

  <h2>Empleado: {{ $valor->nombre . ' ' . $valor->apellido1 . ' ' . $valor->apellido2 }}@isset($valor->jefe_del_dep) <i class="fas fa-star" title="Jefe de Departamento" style="color: goldenrod;"></i>@endisset</h2>
  {{--<h3>Responsable del proyecto: {{ isset($valor->proyecto) ? $valor->proyecto->nombre : 'No es responsable de ninguno' }}</h3>--}}
  <h3>Departamento: <a href="{{ route('departamento', ['id' => $valor->departamento->id]) }}" title="Ver detalle del departamento">{{ $valor->departamento->nombre }}</a></h3>
  <h3>Responsable en el proyecto: @isset($valor->proyecto)<a href="{{ route('proyecto', ['id' => $valor->proyecto->id]) }}" title="Ver detalle del proyecto">{{ $valor->proyecto->nombre }}</a>@else{{ 'No es responsable de ninguno' }}@endisset</h3>

  @if (count($valor->proyectos) == 0)

  <h3>Este empleado no colabora en ningún proyecto.</h3>

  @else

  <h3>Colabora en los [<strong>{{ count($valor->proyectos) }}</strong>] siguientes proyectos:</h3>
  {{--
      SIN MOSTRAR LOS CAMPOS DE FECHA DE LA TABLA PIVOTE
      ======================================================================
  --}}
  {{--
  <ul>
  @foreach ($valor->proyectos as $proyecto)
      <li>
        <a href="{{ route('proyecto', ['id' => $proyecto->id]) }}" title="Ver detalle del proyecto">{{ $proyecto->nombre }}</a>
      </li>
  @endforeach
  </ul>--}}
  {{--
      MOSTRANDO LOS CAMPOS DE FECHA DE LA TABLA PIVOTE
      ======================================================================
  --}}
  <table style="border: 1px solid black;">
        <tr>
            <th>Proyecto</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
        </tr>
  @foreach ($valor->proyectos as $proyecto)
      <tr>
            <td style="border: 1px solid black; padding: 5px;"><a href="{{ route('proyecto', ['id' => $proyecto->id]) }}" title="Ver detalle del proyecto">{{ $proyecto->nombre }}</a></td>
            <td style="border: 1px solid black; padding: 5px; text-align: center;">@php
                echo date('d/m/Y', strtotime($proyecto->pivot->fechahorainicio));
            @endphp{{-- $proyecto->pivot->fechahorainicio --}}</td>
            <td style="border: 1px solid black; padding: 5px; text-align: center;">@php
                    echo date('d/m/Y', strtotime($proyecto->pivot->fechahorafin));
                @endphp{{-- $proyecto->pivot->fechahorafin --}}</td>
      </tr>
  @endforeach
  </table>
  @endif

  @if (count($valor->tareas) == 0)

  <h3>Este empleado no tiene asignada ninguna tarea.</h3>

  @else

  <h3>Tiene [<strong>{{ count($valor->tareas) }}</strong>] tarea(s) asignada(s):</h3>
  <ul>
  @foreach ($valor->tareas as $tarea)
      <li>
        <a href="{{ route('tarea', ['id' => $tarea->id]) }}" title="Ver detalle de la tarea">{{ $tarea->nombre }}</a>
      </li>
  @endforeach
  </ul>
  @endif

@endsection
