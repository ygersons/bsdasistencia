@extends('adminlte::page')

@section('title', 'Ver motivos')

@section('content_header')
    <a href="{{ route('admin.motivo.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de motivos
    </a><h1 class="text-bold">Ver motivos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body ">
            <ul class="list-group">

                

                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Nombre</b>
                    <td>{{ $motivo->nombre }} </td>
                </li>

                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Descripcion</b>
                    <td>{{ $motivo->descripcion }}</td>
                </li>
            </ul>
        </div>
    </div>
@stop

@section('js')
    @if (session('crear-motivo') == 'store')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se registro al motivo",
            });
        </script>
    @endif

    @if (session('update-motivo') == 'ok')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se actualizo correctamente",
            });
        </script>
    @endif
@stop

