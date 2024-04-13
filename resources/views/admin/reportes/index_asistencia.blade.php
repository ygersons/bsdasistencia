@extends('adminlte::page')

@section('title', 'Reporte-asistencia')

@section('content_header')
    <h1 class="text-bold">Reporte de Asistencias</h1>
@stop



@section('content')

    <div class="card">
        <div class="card-body">
            <div class="card-body">
                <a class="btn btn-success float-right text-nowra "
                    href="{{ route('admin.reportes.index_asistencia_excel') }}?fecha_inicio={{ $fecha_inicio }}&fecha_fin={{ $fecha_fin }}&estado={{ $estado }}&codigo={{ $codigo }}&nombres={{ $nombres }}">
                    <i class="primal"></i> Excel
                </a>

                <div class="float-right">
                    <a class="btn btn-danger float-right text-nowra mr-2"
                        href="{{ route('admin.reportes.asistencia_pdf') }}?fecha_inicio={{ $fecha_inicio }}&fecha_fin={{ $fecha_fin }}&estado={{ $estado }}&codigo={{ $codigo }}&nombres={{ $nombres }}"
                        target="_blank">
                        <i class="primal"></i> PDF
                    </a>
                </div>
            </div>
            {!! Form::open(['route' => 'admin.reportes.consultar_asistencia', 'id' => 'formFechas','class' => 'float-left']) !!}
            <div class="container text-left">
                <div class="row align-items-start">
                    <div class="col-2">
                        {!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
                        {!! Form::date('fecha_inicio', isset($fecha_inicio) ? $fecha_inicio : date('Y-m-d'), [
                            'class' => 'form-control',
                            'id' => 'fecha_inicio',
                        ]) !!}
                        @error('fecha_inicio')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2">
                        {!! Form::label('fecha_fin', 'Fecha Fin') !!}
                        {!! Form::date('fecha_fin', isset($fecha_fin) ? $fecha_fin : date('Y-m-d'), [
                            'class' => 'form-control',
                            'id' => 'fecha_fin',
                        ]) !!}
                        @error('fecha_fin')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-3">
                        {!! Form::label('estado', 'Estado') !!}
                        <select class="form-control" id="estado" name="estado" wire:model="estado">
                           <!-- <option hidden selected>Seleccione</option>-->
                            <option value="%">Listado Completo</option>
                            <option value="A">Asistencia</option>
                            <option value="F">Falta</option>
                            <option value="T">Tardanza</option>
                            <option value="J">Justificado</option>
                        </select>
                    </div>
                    <div class="col-1">
                        {!! Form::label('codigo', 'Código') !!}
                        {!! Form::text('codigo', null,['class' => 'form-control','id' => 'codigo','maxlength'=> '4']) !!}
                        @error('codigo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2">
                        {!! Form::label('nombres', 'Nombres') !!}
                        {!! Form::text('nombres', null,['class' => 'form-control','id' => 'nombres']) !!}
                        @error('nombres')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2 align-self-end">
                        {!! Form::submit('Buscar', ['class' => 'btn btn-primary ml-4', 'id' => 'btnBuscar']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <span class="negrita"> Asistencias </span>
        </div>
        @if (!empty($asistencia_rpt))
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Item</th>
                            <th>DNI</th>
                            <th>Código</th>
                            <th>Alumnos</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asistencia_rpt as $asistencia)
                            <tr>
                                <td width="20px">{{ $loop->iteration }}</td>
                                </td>
                                <td>{{ $asistencia->dniA }}</td>
                                <td>{{ $asistencia->codigo }}</td>
                                <td>{{ $asistencia->nombreA }}</td>
                                <td>{{ \Carbon\Carbon::parse($asistencia->entradaA)->format('h:i:s a') }}</td>
                                <td>{{ $asistencia->salidaA }}</td>
                                <td>{{ \Carbon\Carbon::parse($asistencia->fechaA)->format('d/m/Y') }}</td>
                                <td>@if ($asistencia->status =='A')
                                        Asistencia
                                    @elseif ($asistencia->status =='T')
                                        Tardanza
                                    @elseif ($asistencia->status =='J')
                                        Justificado
                    				@else
                                        Falta
                                @endif
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        @else
            <div class="card-body">
                <strong>Sin Registros</strong>
            </div>
        @endif
    @stop
