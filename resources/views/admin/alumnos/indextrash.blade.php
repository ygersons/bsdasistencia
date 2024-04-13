@extends('adminlte::page')

@section('title', 'Listado de los alumnos')

@section('content_header')
    <a href="{{ route('admin.alumnos.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Alumnos
    </a>
    <h1 class="text-bold">Alumnos removidos</h1>
@stop

@section('content')
    <div class="card">
        @if ($bsd_alumno->count())
            <div class="card-body" style="overflow: hidden">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="border">
                            <tr>
                                <th>Item</th>
                                <th>Año</th>
                                <th>Código</th>
                                <th>DNI</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombres</th>
                                <th>Protección datos</th>
                                <th>Turno</th>
                                <th>Acciones</th>
                                {{-- <th>Fecha Nacimiento</th>
                            <th>Sexo</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Codigo de barras</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bsd_alumno as $alumno)
                                <tr>
                                    <td width="20px">{{ $loop->iteration }}</td>
                                    <td>{{ $alumno->anio }}</td>
                                    <td>{{ $alumno->codigo }}</td>
                                    <td>{{ $alumno->dni }}</td>
                                    <td>{{ $alumno->ape_pat }}</td>
                                    <td>{{ $alumno->ape_mat }}</td>
                                    <td>{{ $alumno->nombres }}</td>
                                    <td style="text-align: center;">
                                        @if ($alumno->proteccion_datos == 'S')
                                            SI
                                        @else
                                            NO
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        @if ($alumno->turno == 'M')
                                        Mañana
                                        @else
                                        Tarde
                                        @endif
                                    </td>
                                    {{-- <td>{{ $alumno->fecha_nacimiento }}</td>
                                <td>{{ $alumno->sexo }}</td>
                                <td>{{ $alumno->celular }}</td>
                                <td>{{ $alumno->email }}</td> --}}

                                    <td width="270px">
                                        <div class="d-flex" style="gap: 10px">
                                            <form action="{{ route('admin.alumnos.restaurarAlumnos', $alumno) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-info text-nowrap">
                                                    <i class="fas fa-plus-circle"></i> Restaurar
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.alumnos.destroy', $alumno) }}" method="POST"
                                                class="eliminar">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                                    <i class="fas fa-minus-circle"></i>Eliminar

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
    @if (session('success') === 'restaurar')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El alumno se ha restaurado con éxito',
            })
        </script>
    @endif

    @if (session('borrar-alumno') == 'ok')
        <script>
            Swal.fire(
                {
                icon: 'success',
                title: 'El alumno se elimino',
            }

            )
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