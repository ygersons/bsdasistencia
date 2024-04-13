@extends('adminlte::page')

@section('title', 'Listado de los apoderados')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.apoderados.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    <h1 class="text-bold">Carga de apoderados</h1>

@stop

@section('content')
    @livewire('admin.carga-apoderado-index')
@stop

@section('js')

    @if (session('crear-apoderado') == 'store')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se registro al apoderado",
            });
        </script>
    @endif


    @if (session('borrar-apoderado') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!'
                'El apoderado se elimino'
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

@if (session('actualizado') == 'apoderado_actualizado')
<script>
    Swal.fire({
        icon: "success",
        title: "Se actualizo la lista de apoderados",
    });
</script>
@endif

@if (session('vacio') == 'apoderado_vacio')
<script>
    Swal.fire({
        icon: "error",
        title: "Elija un archivo",
    });
</script>
@endif

@stop
