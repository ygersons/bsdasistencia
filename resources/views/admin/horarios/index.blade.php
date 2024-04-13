@extends('adminlte::page')

@section('title', 'Listado de los Alumnos')

@section('content_header')

<a class="btn btn-primary float-right text-nowra" href="{{ route('admin.horarios.create') }}">
    <i class="fas fa-plus-circle"></i> Registrar
</a>
<h1 class="text-bold">Lista de Horarios</h1>

@stop

@section('content')
@livewire('admin.horario-index')
@stop

@section('js')
@if (session('edit-horario') == 'ok')
<script>
    Swal.fire({
            icon: "success",
            title: "Se edito el Correctamente",
        });
</script>
@endif
@if (session('store-horario') == 'ok')
<script>
    Swal.fire({
            icon: "success",
            title: "Se registro correctamente",
        });
</script>
@endif
@if (session('update-horario') == 'ok')
<script>
    Swal.fire({
            icon: "success",
            title: "Se actualizo correctamente",
        });
</script>
@endif
@if (session('delete-horario') == 'ok')
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