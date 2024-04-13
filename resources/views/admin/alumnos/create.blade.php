@extends('adminlte::page')

@section('title', 'Registrar Alumno')

@section('content_header')
    <a href="{{ route('admin.alumnos.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Alumnos
    </a>
    <h1 class="text-bold">Registrar Alumno</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.alumnos.store','enctype'=>'multipart/form-data']) !!}
        
            @include('admin.alumnos.partials.form')
            <div class="float-right">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        #alumno_loading{
            width: 160px;
            height: 40px;
            gap:10px
        }
    </style>
@endsection