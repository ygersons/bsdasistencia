@extends('adminlte::page')

@section('title', 'Listado de los Alumnos')

@section('content_header')

    <h1 class="text-bold">Lista de Alumnos</h1>

@stop

@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @livewire('admin.reporte-alumno-index')
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


    @if (session('borrar-alumno') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!'
                'El alumno se elimino'
                'success'
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

@if (session('iguales') == 'todos_iguales')
    <script>
        Swal.fire({
            icon: "warning",
            title: "Los datos del archivo son iguales a los existentes.",
        });
    </script>
@endif

@stop
