@extends('adminlte::page')

@section('title', 'Listado de Grado')

@section('content_header')

    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.grado.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    <h1 class="text-bold">Lista de Grado</h1>

@stop

@section('content')
    @livewire('admin.grado-index')
@stop

@section('js')


    @if (session('edit-grado') == 'ok')
        <script>
            Swal.fire({
                icon: "success",
                title: "Se edito el Correctamente",
            });
        </script>
    @endif

    @if (session('removido') == 'grado_removido')
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
