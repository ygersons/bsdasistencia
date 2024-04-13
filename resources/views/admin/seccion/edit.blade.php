@extends('adminlte::page')

@section('title', 'Editar seccion')

@section('content_header')
    <a href="{{ route('admin.seccion.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Sección
    </a>
    <h1 class="text-bold">Editar sección</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Form::model($seccion, ['route' => ['admin.seccion.update', $seccion], 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
            @include('admin.seccion.partials.form')
            <div class="float-right">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
