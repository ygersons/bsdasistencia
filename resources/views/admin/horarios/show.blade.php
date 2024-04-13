@extends('adminlte::page')

@section('title', 'Ver Alumnos')

@section('content_header')
    <a href="{{ route('admin.horarios.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Horarios
    </a>
    <h1 class="text-bold">Vista Horario</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="card-body ">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Nombre:</b>
                    <td>{{ $horario->nombre}}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Descripcón:</b>
                    <td>{{ $horario->descripcion }}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Fecha inicial:</b>
                    <td>{{ $horario->fecha_ini }}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Fecha final:</b>
                    <td>{{ $horario->fecha_fin }}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Hora inicial:</b>
                    <td>{{ $horario->hora_ini }}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Hora final:</b>
                    <td>{{ $horario->hora_fin }}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Activo:</b>
                    <td>@if ($horario->ind_vigencia =='S')
                        SI @else NO
                       @endif</td>
                </li>
        </div>
    </div>
@stop

@section('js')
    @if (session('crear-horario') == 'store')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se registro el Horario",
            });
        </script>
    @endif
@stop