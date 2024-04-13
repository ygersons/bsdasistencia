@extends('adminlte::page')

@section('title', 'Listado de los Apoderados')

@section('content_header')
    <a href="{{ route('admin.apoderados.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Apoderados
    </a>
    <h1 class="text-bold">Apoderados removidos</h1>
@stop

@section('content')
    <div class="card">
        @if ($bsd_apoderado->count())
            <div class="card-body" style="overflow: hidden">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover ">
                        <thead class="border text-center">
                            <tr>
								<th>Item</th>
                                <th>Doc. ID</th>
                                <th>N° Doc.</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombres</th>
                                {{-- <th>Celular</th>
                            <th>Email</th>
                            <th>Sexo</th> --}}
                                <th>DNI Alumno</th>
                                <th>Parentesco</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bsd_apoderado as $apoderado)
                                <tr>
                                	<td width="20px">{{ $loop->iteration }}</td>
                                    <td>{{ $apoderado->doc_identidad }}</td>
                                    <td>{{ $apoderado->nro_doc_iden }}</td>
                                    <td>{{ $apoderado->ape_pat }}</td>
                                    <td>{{ $apoderado->ape_mat }}</td>
                                    <td>{{ $apoderado->nombres }}</td>
                                    {{-- <td>{{ $apoderado->celular }}</td>
                                <td>{{ $apoderado->email }}</td>
                                <td>{{ $apoderado->sexo }}</td> --}}
                                    <td>{{ $apoderado->dni_alumno }}</td>
                                    <td>{{ $apoderado->parentesco }}</td>

                                    <td width="270px">
                                        <div class="d-flex" style="gap: 10px">
                                            <form action="{{ route('admin.apoderados.restaurarApoderados', $apoderado) }}"
                                                method="POST">

                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-info text-nowrap">
                                                    <i class="fas fa-plus-circle"></i> Restaurar

                                                </button>
                                            </form>

                                            <form action="{{ route('admin.apoderados.destroy', $apoderado) }}"
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

    @if (session('delete-apoderado') == 'ok')
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
