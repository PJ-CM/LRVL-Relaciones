@extends('layouts.default')

@section('title', 'UD5. ORM')

@section('content')

    <h2>Departamentos</h2>

    @if ($valoresTOT == 0)

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Jefe Dep.</th>
            </tr>
        <thead>
        <tbody>
            <tr>
                <td colspan="4">{{ 'No existen ' . strtoupper($valores_tipo.'s') . ' disponibles en la actualidad. Vuelva en otro momento. Gracias.' }}</td>
            </tr>
        </tbody>
    </table>

    @else

    <h3>Hay [<strong>{{ $valoresTOT }}</strong>] {{ $valores_tipo }}(s) disponible(s)</h3>
    <table id="listado">
        <thead>
            <tr>
                <th>#</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Jefe Dep.</th>
            </tr>
        <thead>
        <tbody>
            <?php //var_dump($valores);
            $contador = 0; ?>
            @foreach ($valores as $valor)
                @php
                    $contador++;
                @endphp
            <tr class="filas">
                <td>{{ $contador < 10 ? '0'.$contador : $contador }}</td>
                <td><a href="{{ url('/'.$valores_tipo.'/'.$valor->id) }}" title="Ir al detalle" class="negrita">{{ $valor->codigo }}</a></td>
                <td>{{ $valor->nombre }}</td>
                <td><a href="{{ route('empleado', ['id' => $valor->empleado_jefe->id]) }}" title="Ver el detalle del empleado jefe">{{ $valor->empleado_jefe->nombre . ' ' . $valor->empleado_jefe->apellido1 . ' ' . $valor->empleado_jefe->apellido2 }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif

@endsection
