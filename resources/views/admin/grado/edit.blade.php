@extends('adminlte::page')

@section('title', 'Editar grado')

@section('content_header')
    <a href="{{ route('admin.grado.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de grado
    </a>
    <h1 class="text-bold">Editar grado</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Form::model($grado, ['route' => ['admin.grado.update', $grado], 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
            @include('admin.grado.partials.form')
            <div class="float-right">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
