@extends('adminlte::page')

@section('title', 'Ver grados')

@section('content_header')
    <a href="{{ route('admin.grado.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de grados
    </a><h1 class="text-bold">Ver grados</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body ">
            <ul class="list-group">

                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Codigo</b>
                    <td>{{ $grado->codigo }}</td>
                </li>

                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Nombre</b>
                    <td>{{ $grado->nombre }} </td>
                </li>

                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Descripcion</b>
                    <td>{{ $grado->descripcion }}</td>
                </li>
            </ul>
        </div>
    </div>
@stop

@section('js')
    @if (session('crear-grado') == 'store')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se registro al grado",
            });
        </script>
    @endif

    @if (session('update-grado') == 'ok')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se actualizo correctamente",
            });
        </script>
    @endif
@stop

