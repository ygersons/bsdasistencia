@extends('adminlte::page')

@section('title', 'Editar Alumnos')

@section('content_header')
    <a href="{{ route('admin.horarios.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Horarios
    </a>
    <h1 class="text-bold">Editar Horario</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="card-body">
            {!! Form::model($horario, ['route' => ['admin.horarios.update', $horario], 'method' => 'put']) !!}
            @include('admin.horarios.partials.form')
            <div class="float-right">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
