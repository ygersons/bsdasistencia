@extends('adminlte::page')

@section('title', 'Listado de los motivo')

@section('content_header')
    <a href="{{ route('admin.motivo.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de motivos
    </a>
    <h1 class="text-bold">motivo removido</h1>
@stop

@section('content')
    <div class="card">
        @if ($bsd_motivo->count())
            <div class="card-body" style="overflow: hidden">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover ">
                        <thead class="border text-center">
                            <tr>
                                <th>Item</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bsd_motivo as $motivo)
                                <tr>
                                    <td width="20px">{{ $loop->iteration }}</td>
                                    </td>
                                    <td>{{ $motivo->nombre }}</td>
                                    <td>{{ $motivo->descripcion }}</td>
                                    <td width="270px">
                                        <div class="d-flex" style="gap: 10px">
                                            <form action="{{ route('admin.motivo.restaurarmotivo', $motivo) }}"
                                                method="POST">

                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-info text-nowrap">
                                                    <i class="fas fa-plus-circle"></i> Restaurar

                                                </button>
                                            </form>

                                            <form action="{{ route('admin.motivo.destroy', $motivo) }}"
                                                method="POST" class="eliminar">

                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                                    <i class="fas fa-minus-circle"></i> Eliminar

                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="card-body">
                <strong>Sin registros</strong>
            </div>
        @endif
    </div>
@stop

@section('js')

    @if (session('success') == 'restaurar')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Se restauro con éxito',
            })
        </script>
    @endif

    @if (session('delete-motivo') == 'ok')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se elimino correctamente",
            });
        </script>
    @endif
    <script>
        $('.eliminar').submit(function(e) {
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
                if (result.value) {
                    this.submit();
                }
            })
        })
    </script>
@stop
