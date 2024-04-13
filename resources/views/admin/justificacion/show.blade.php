@extends('adminlte::page')

@section('title', 'Ver Justificaciones')

@section('content_header')
    <a href="{{ route('admin.justificacion.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Justificaciones
    </a>
    <h1 class="text-bold">Ver Justificaciones</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">FECHA:</b>
                    <td>{{ $justificacion->fecha_reg }}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">DNI</b>
                    <td>{{ $justificacion->dni }}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Codigo Alumno</b>
                    <td>{{ $justificacion->codigo }}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Justificacion</b>
                    <td>{{ $justificacion->justificacion }}</td>
                </li>

                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Observacion</b>
                    <td>{{ $justificacion->observacion }}</td>
                </li>

            </ul>

        </div>
    </div>



@stop


@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('crear-justificacion') == 'store')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se registro la justificacion",
            });
        </script>
    @endif
@stop
