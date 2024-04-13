@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.roles.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de roles
    </a>
    <h1 class="text-bold">Editar Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="flex-grow-1">Rol: <span class="badge badge-warning">{{ $role->name }}</span></h5>
            <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-sm btn-info text-nowrap">
                <i class="fas fa-eye"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
            @include('admin.roles.partials.form')
            <div class="float-right">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop