@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-right text-nowrap">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    {{-- <button type="button" class="btn btn-primary float-right text-nowrap" data-toggle="modal"
        data-target="#admin_users_modals_create">
        <i class="fas fa-plus-circle"></i> crear un usuario
    </button> --}}
    <h1 class="text-bold">Lista De Usuarios</h1>
@stop

@section('content')
    {{-- @include('admin.users.modals.create')
    @if (isset($user))
        @include('admin.users.modals.show')
    @endif --}}
    @livewire('admin.users-index')
@stop

@section('js')
    
    @if (session('success') === 'destroy')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El usuario se eliminó con éxito',
            })
        </script>
    @endif

    {{-- @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El usuario se creó con éxito',
            })
        </script>
    @endif --}}

    <script>
        $('.form-delete').submit(function(e) {
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
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
        // $('#admin_users_modals_show').modal('show')
    </script>


    {{-- JS para modals bootstrap --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}
@stop
