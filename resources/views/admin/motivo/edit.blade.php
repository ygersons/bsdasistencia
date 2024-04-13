@extends('adminlte::page')

@section('title', 'Editar motivo')

@section('content_header')
    <a href="{{ route('admin.motivo.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de motivo
    </a>
    <h1 class="text-bold">Editar motivo</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Form::model($motivo, ['route' => ['admin.motivo.update', $motivo], 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
            @include('admin.motivo.partials.form')
            <div class="float-right">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
