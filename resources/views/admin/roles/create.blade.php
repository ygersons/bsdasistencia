@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.roles.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de roles
    </a>
    <h1 class="text-bold">Crear rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
            @include('admin.roles.partials.form')
            <div class="float-right">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
