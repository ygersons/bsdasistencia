@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-bold">Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-3 text-bold">Información</h5>
            <ul class="list-group">
                <li class="list-group-item">
                    <b>Nombre:</b>
                    {{ auth()->user()->name }}
                </li>
                <li class="list-group-item">
                    <b>Correo:</b>
                    {{ auth()->user()->email }}
                </li>
                <li class="list-group-item">
                    <b>Rol:</b>
                    @if (auth()->user()->roles->count())
                        <td>
                            @foreach (auth()->user()->roles as $userrol)
                                <span class="badge badge-secondary text-nowrap">
                                    {{ $userrol->name }}
                                </span>
                            @endforeach
                        </td>
                    @else
                        <td>
                            <span class="badge badge-warning text-nowrap">
                                Sin rol
                            </span>
                        </td>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    
    <div class="max-w-7xl py-10 sm:px-6 lg:px-8">
        
        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>
            <x-section-border/>
            
        @endif

        <div class="mt-10 sm:mt-0">
            @livewire('profile.logout-other-browser-sessions-form')
        </div>

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
        <x-section-border/>

            {{--<div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>--}}
        @endif
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop
@section('js')
<script src="{{ asset('app/js/app.js') }}" type="text/javascript"></script>
@stop

