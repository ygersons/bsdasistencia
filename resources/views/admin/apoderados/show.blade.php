@extends('adminlte::page')

@section('title', 'Ver Apoderados')

@section('content_header')
    <a href="{{ route('admin.apoderados.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Apoderados
    </a><h1 class="text-bold">Ver Apoderados</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body ">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Documento:</b>
                    <td>{{ $apoderado->doc_identidad}}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">N° documento:</b>
                    <td>{{ $apoderado->nro_doc_iden }}</td>
                </li>

                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Nombre Completo:</b>
                    <td>{{ $apoderado->ape_pat }} {{ $apoderado->ape_mat }} {{ $apoderado->nombres }}</td>
                </li>

                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Celular:</b>
                    <td>{{ $apoderado->celular }}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Email:</b>
                    <td>{{ $apoderado->email }}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Sexo:</b>
                    <td>
                        @if ($apoderado->sexo === 'M')
                        {{ 'Masculino' }}
                        @endif
                        @if($apoderado->sexo === 'F')
                        {{ 'Femenino' }}
                    @endif
                    </td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">DNI alumno:</b>
                    <td>{{ $apoderado->dni_alumno }}</td>
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Parentesco:</b>
                    <td>{{ $apoderado->parentesco }}</td>
                </li>
                </ul>   
        </div>
    </div>
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
@stop
