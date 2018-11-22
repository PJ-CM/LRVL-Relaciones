@extends('layouts.default')

@section('title', 'UD5. ORM')

@section('content')

    <h2>Proyectos</h2>

    @if ($valoresTOT == 0)

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Título</th>
                <th>Responsable</th>
            </tr>
        <thead>
        <tbody>
            <tr>
                <td colspan="4">{{ 'No existen ' . strtoupper($valores_tipo.'s') . ' disponibles en la actualidad. Vuelva en otro momento. Gracias.' }}</td>
            </tr>
        </tbody>
    </table>

    @else

    <h3>Hay [{{ $valores->total() }}] {{ $valores_tipo }}(s) disponible(s) :: Pág. {{ $valores->currentPage() }} de {{ $valores->lastPage() }}</h3>
    {{--<ul>
        <li>{{ '$valores->count(), cantidad de registros por página: ' . $valores->count() }}</li>
        <li>{{ '$valores->currentPage(), núm de página actual: ' . $valores->currentPage() }}</li>
        <li>{{ '$valores->firstItem(), primer ITEM: ' . $valores->firstItem() }}</li>
        <li>{{ '$valores->hasMorePages(), hay más páginas: ' . $valores->hasMorePages() }}</li>
        <li>{{ '$valores->lastItem(), último ITEM: ' . $valores->lastItem() }}</li>
        <li>{{ '$valores->lastPage(), última página: ' . $valores->lastPage() }}</li>
        <li>{{ '$valores->nextPageUrl(), URL siguiente página: ' . $valores->nextPageUrl() }}</li>
        <li>{{ '$valores->onFirstPage(), en la Primera página: ' . $valores->onFirstPage() }}</li>
        <li>{{ '$valores->perPage(), por página: ' . $valores->perPage() }}</li>
        <li>{{ '$valores->previousPageUrl(), URL anterior página: ' . $valores->previousPageUrl() }}</li>
        <li>{{ '$valores->total(), Total de registros de la consulta: ' . $valores->total() }}</li>--}}
        {{--<li>{{ '$valores->url($page), por ejemplo, si $page es 7, imprime la URL hacia la página 7: ' . $valores->url(7) }}</li>--}}
    </ul>
    <table id="listado">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Título</th>
                <th>Responsable</th>
            </tr>
        <thead>
        <tbody>
            <?php //var_dump($valores);
            ////$contador = 0;
            $contador = ($valores->perPage() * ($valores->currentPage() - 1)); ?>
            @foreach ($valores as $valor)
                @php
                    $contador++;
                @endphp
            <tr class="filas">
                <td>{{ $contador < 10 ? '0'.$contador : $contador }}</td>
                <td><a href="{{ url('/'.$valores_tipo.'/'.$valor->id) }}" title="Ir al detalle" class="negrita">{{ $valor->nombre }}</a></td>
                <td>{{ $valor->titulo }}</td>
                <td><a href="{{ route('empleado', ['id' => $valor->empleado->id]) }}" title="Ver detalle del responsable">{{ $valor->empleado->nombre . ' ' . $valor->empleado->apellido1 . ' ' . $valor->empleado->apellido2 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{--PAGINACIÓN::Enlaces--}}
    {{ $valores->links() }}

    @endif

@endsection
