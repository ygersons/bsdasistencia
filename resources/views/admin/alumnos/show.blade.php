@extends('adminlte::page')

@section('title', 'Ver Alumnos')

@section('content_header')
<a href="{{ route('admin.alumnos.index') }}" class="float-right mt-2">
    <i class="fas fa-chevron-circle-left"></i> Ver lista de Alumnos
</a>
<h1 class="text-bold">Ver Alumno</h1>
@stop

@section('content')
<div class="card">
    <br>
    <form action="{{ route('admin.alumnos.generar-carne', $alumno) }}" method="post">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-sm btn-danger text-nowrap float-right mr-4">
            <i class="fas fa-file-pdf"></i> Generar Carnet
        </button>
    </form>
    <div class="card-body">
        <ul class="list-group">

            <li class="list-group-item">
                <b style="min-width:200px; display: inline-block">Protección de datos:</b>
                <span class="@if($alumno->proteccion_datos === 'S') text-success @else text-danger @endif">
                    <td>
                        @if ($alumno->proteccion_datos === 'S')
                        {{ 'SI' }}
                        @endif
                        @if ($alumno->proteccion_datos === 'N')
                        {{ 'NO' }}
                        @endif
                    </td>
            </li>

            <li class="list-group-item">
                <b style="min-width:200px; display: inline-block">Foto:</b>
                <td class="img-fluid"><img src="/img/fotos_alumnos/{{$alumno->image}}"
                        style="max-width: 100px;a height: auto"></td>
            </li>
            <li class="list-group-item">
                <b style="min-width:200px; display: inline-block">Codigo:</b>
                <td>{{ $alumno->codigo}}</td>
            </li>

            <li class="list-group-item">
                <b style="min-width:200px; display: inline-block">DNI:</b>
                <td>{{ $alumno->dni }}</td>
            </li>

            <li class="list-group-item">
                <b style="min-width:200px; display: inline-block">Nombres:</b>
                <td>{{ $alumno->ape_pat }} {{ $alumno->ape_mat }} {{ $alumno->nombres }}</td>
            </li>

            <li class="list-group-item">
                <b style="min-width:200px; display: inline-block">Fecha nacimiento:</b>
                <td>{{ $alumno->fecha_nacimiento }}</td>
            </li>

            <li class="list-group-item">
                <b style="min-width:200px; display: inline-block">Sexo:</b>
                <td>
                    @if ($alumno->sexo === 'M')
                    {{ 'Masculino' }}
                    @endif
                    @if($alumno->sexo === 'F')
                    {{ 'Femenino' }}
                    @endif
                </td>
            </li>
            <li class="list-group-item">
                <b style="min-width:200px; display: inline-block">Turno:</b>
                <td>
                    @if ($alumno->turno === 'M')
                    {{ 'Mañana' }}
                    @elseif ($alumno->turno =='T')
                    {{ 'Tarde' }}
                    @endif
                </td>
            </li>
            <li class="list-group-item">
                <b style="min-width:200px; display: inline-block">Celular:</b>
                <td>{{ $alumno->celular }}</td>
            </li>

            <li class="list-group-item">
                <b style="min-width:200px; display: inline-block">Email:</b>
                <td>{{ $alumno->email }}</td>
            </li>

            <li class="list-group-item">
                <b style="min-width:200px; display: inline-block">Etiqueta:</b>
                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($alumno->dni, 'C128')}}" alt="barcode" />


                <a class="btn btn-success" download="{{ $alumno->dni }}.png" href="/img/cod_bar/{{ $alumno->dni }}.png"
                    target="_blank">Descargar</a>

            </li>

        </ul>
    </div>
</div>



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

@if (session('info') == 'update')
<script>
    Swal.fire({
                icon: "success",
                title: "Se actualizaron los datos del alumno",
            });
</script>
@endif
@stop