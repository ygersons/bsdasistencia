@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.users.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de usuarios
    </a>
    <h1 class="text-bold">Crear Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store']) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6">
                        {!! Form::label('email', 'Correo') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        {!! Form::label('password', 'Contraseña') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6">
                        {!! Form::label('password_confirmation', 'Confirmar contraseña') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
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
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
