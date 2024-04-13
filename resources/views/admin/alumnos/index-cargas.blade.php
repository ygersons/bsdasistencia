@extends('adminlte::page')

@section('title', 'Listado de los Alumnos')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.alumnos.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    <h1 class="text-bold">Carga de alumnos</h1>

@stop

@section('content')
    @livewire('admin.carga-alumno-index')
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

@stop
