@extends('adminlte::page')

@section('title', 'Listado de los Profesores')


@section('content_header')
    
    <h1 class="text-bold">Lista de Asistencias</h1>
@stop

@section('content')
    @livewire('admin.asistencia-index')
@stop