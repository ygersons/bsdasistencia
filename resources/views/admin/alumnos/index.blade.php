@extends('adminlte::page')

@section('title', 'Listado de los Alumnos')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.alumnos.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    <h1 class="text-bold">Lista de Alumnos</h1>

@stop

@section('content')
    @livewire('admin.alumno-index')
@stop

@section('js')

    @if (session('crear-alumno') == 'store')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se registro al alumno",
            });
        </script>
    @endif


    @if (session('removido') == 'alumno_removido')
        <script>
            Swal.fire({
                icon: "success",
                title: "El Alumno se ha removido con éxito",
            }
            )
        </script>
    @endif

    <script>
        $('.remover').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Va a remover un alumnos',
                text: "Puede restaurarlo o eliminarlo para siempre en la opción: Removidos",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Remover',
                cancelButtonText: 'Cancelar'

            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            })
        })
    </script>

    @if (session('actualizado') == 'alumno_actualizado')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se actualizo la lista de alumnos",
            });
        </script>
    @endif

    @if (session('vacio') == 'alumno_vacio')
        <script>
            Swal.fire({
                icon: "error",
                title: "Elija un archivo",
            });
        </script>
    @endif
@stop
