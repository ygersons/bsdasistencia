@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.roles.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de roles
    </a>
    <h1 class="text-bold">Ver Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="flex-grow-1">Rol: <span class="badge badge-warning">{{ $role->name }}</span></h5>
            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-success text-nowrap">
                <i class="fas fa-pen"></i> Editar
            </a>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark text-bold">
                    Lista de permisos
                </li>
                @if ($role->permissions->count())

                    @foreach ($role->permissions as $permission)
                        <li class="list-group-item">
                            {{ $permission->description }}
                        </li>
                    @endforeach
                @else
                    <li class="list-group-item">
                        No tiene asignado ningún permisos
                    </li>
                @endif
            </ul>
        </div>
    </div>
@stop

@section('js')
    
    @if (session('success') == 'update')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El rol se editó con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El rol se creó con éxito',
            })
        </script>
    @endif
@stop
