@extends('adminlte::page')

@section('title', 'Justificaciones')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.justificacion.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    <h1 class="text-bold">Lista de Justificaciones</h1>
@stop

@section('content')
    @livewire('admin.justificacion-index')
@stop