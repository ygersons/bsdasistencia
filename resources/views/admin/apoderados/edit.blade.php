@extends('adminlte::page')

@section('title', 'Editar Apoderado')

@section('content_header')
    <a href="{{ route('admin.apoderados.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Apoderados
    </a>
    <h1 class="text-bold">Editar Apoderado</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="card-body">
            {!! Form::model($apoderado, ['route' => ['admin.apoderados.update', $apoderado], 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
            @include('admin.apoderados.partials.form')
            <div class="float-right">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
