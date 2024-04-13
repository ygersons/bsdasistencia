@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary float-right text-nowrap">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    <h1 class="font-weight-bold">Lista de Roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="border">
                    <tr>
                        <th>Item</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td width="20px">{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="260px">
                                <div class="d-flex" style="gap: 10px">
                                    <a href="{{ route('admin.roles.edit', $role) }}"
                                        class="btn btn-sm btn-success text-nowrap">
                                        <i class="fas fa-pen"></i>
                                    </a>
									<a href="{{ route('admin.roles.show', $role) }}"
                                        class="btn btn-sm btn-info text-nowrap">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST"
                                        class="form-delete text-nowrap">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="fas fa-minus-circle"></i> </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El rol se eliminó con éxito',
            })
        </script>
    @endif

    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Elija la opción Eliminar para confirmar.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
    </script>
@stop
