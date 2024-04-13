@extends('adminlte::page')

@section('title', 'Listado de Apoderados')

@section('content_header')
    
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.apoderados.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    <h1 class="text-bold">Lista de Apoderados</h1>

@stop

@section('content')
    @livewire('admin.apoderado-index')
@stop

@section('js')
@if (session('removido') == 'apoderado_removido')
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
