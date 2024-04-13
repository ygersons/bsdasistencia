@extends('adminlte::page')

@section('title', 'Listado de los Profesores')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.profesores.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    <h1 class="text-bold">Lista de Profesores</h1>
@stop

@section('content')
    <div class="card">
        
            <div class="card-body" style="overflow: hidden">
                <div style="overflow: auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Materia</th>
                            </tr>
                        </thead>                      
    </div>
@stop