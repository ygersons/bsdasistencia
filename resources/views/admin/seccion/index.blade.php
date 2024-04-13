@extends('adminlte::page')

@section('title', 'Listado de seccion')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.seccion.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    <h1 class="text-bold">Lista de Sección</h1>
@stop

@section('content')
    @livewire('admin.seccion-index')
@stop

@section('js')
    @if (session('edit-seccion') == 'ok')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se edito la seccion Correctamente",
            });
        </script>
    @endif

    @if (session('store-seccion') == 'ok')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se registro correctamente",
            });
        </script>
    @endif



    @if (session('removido') == 'seccion_removido')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se removio correctamente",
            });
        </script>
    @endif
    <script>
        $('.remover').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: '¿Estás seguro?',
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
@stop
