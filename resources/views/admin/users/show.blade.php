@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.users.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de usuarios
    </a>
    <h1 class="text-bold">Ver Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="flex-grow-1">Usuario: <span class="badge badge-warning">{{ $user->name }}</span></h5>
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-success text-nowrap">
                <i class="fas fa-pen"></i> Editar
            </a>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:100px; display: inline-block">Nombre:</b> {{ $user->name }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:100px; display: inline-block">Correo:</b> {{ $user->email }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:100px; display: inline-block">Rol:</b>
                    @if ($user->roles->count())
                        <td>
                            @foreach ($user->roles as $userrol)
                                <span class="badge badge-secondary text-nowrap">
                                    {{ $userrol->name }}
                                </span>
                            @endforeach
                        </td>
                    @else
                        <td>
                            <span class="badge badge-warning text-nowrap">
                                Sin rol
                            </span>
                        </td>
                    @endif
                </li>
            </ul>
        </div>
    </div>
@stop

@section('js')
    @if (session('success') == 'update')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El usuario se editó con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El usuario se creó con éxito',
            })
        </script>
    @endif
@stop
