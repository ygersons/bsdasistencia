@extends('adminlte::page')

@section('title', 'Registrar Grado')

@section('content_header')
    <a href="{{ route('admin.grado.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Grados
    </a>
    <h1 class="text-bold">Registrar Grado</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.grado.store','enctype'=>'multipart/form-data']) !!}

            @include('admin.grado.partials.form')
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
        #grado_loading{
            width: 160px;
            height: 40px;
            gap:10px
        }
    </style>
@endsection
