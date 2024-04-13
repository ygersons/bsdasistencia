@extends('adminlte::page')

@section('title', 'Ver seccion')

@section('content_header')
    <a href="{{ route('admin.seccion.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Sección
    </a>
    <h1 class="text-bold">Ver Sección</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body ">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Código</b>
                    <td>{{ $seccion->codigo }}</td>
                </li>

                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Nombre</b>
                    <td>{{ $seccion->nombre }} </td>
                </li>

                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Descripción</b>
                    <td>{{ $seccion->descripcion }}</td>
                </li>
            </ul>
        </div>
    </div>
@stop

@section('js')

    @if (session('crear-seccion') == 'store')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se Registro la Sección",
            });
        </script>
    @endif

    @if (session('update-seccion') == 'ok')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se actualizo correctamente",
            });
        </script>
    @endif
@stop

