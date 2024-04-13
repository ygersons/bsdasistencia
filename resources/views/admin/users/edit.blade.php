@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.users.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de usuarios
    </a>
    <h1 class="text-bold">Editar Usuario</h1>
@stop

@section('content')
    
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="flex-grow-1">Usuario: <span class="badge badge-warning">{{ $user->name }}</span></h5>
            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-info text-nowrap">
                <i class="fas fa-eye"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            {!! Form::label(null, 'Rol') !!}
            <div class="form-group border rounded-lg p-2">
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="float-right">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop