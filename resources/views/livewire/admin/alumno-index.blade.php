<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.alumnos.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <div class="float-right">
            <form class="form-inline float-right mr-2"
                action="{{ route('admin.alumnos.pdf.alumnosGrado', $bsd_alumno) }}" method="GET" id="carnetForm">

                <select class="form-control mr-1" id="grado" name="grado" wire:model.live="grado">
                    <option hidden selected>Selecciona Grado</option>
                    <option value="">Listado Completo</option>
                    <option value="1">Primer Año</option>
                    <option value="2">Segundo Año</option>>
                    <option value="3">Tercer Año </option>
                    <option value="4">Cuarto Año</option>
                    <option value="5">Quinto Año</option>
                </select>


                
                <div>
                    <!-- Mostrar el segundo select solo cuando el primero tiene un valor seleccionado -->
                    <select class="form-control mr-1" id="filtroaula" name="filtroaula" wire:model.live="filtroaula"
                        wire:ignore>
                        <option hidden selected>Selecciona Aula</option>
                        <option value="A">Azul</option>
                        <option value="C">Crema</option>
                        <option value="N">Naranja</option>
                        <option value="R">Rojo</option>
                        <option value="V">Verde</option>
                    </select>
                </div>
                
                <button class="btn btn-danger ml-2" type="submit">
                    <i class="fas fa-file-pdf"></i>Generar Carnet</button>

            </form>
        </div>


        <div class="card-header">

            <input wire:model.live="search" class="form-control" type="text" placeholder="Busque por nombre">
        </div>
        @if ($bsd_alumno->count())
        <div class="card-body" style="overflow: hidden">
            <div>
                {{ $bsd_alumno->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border text-center">
                        <tr>
                            <th>Item</th>
                            <th>Código</th>
                            <th>DNI</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Nombres</th>
                            <th>Protección datos</th>
                            <th>Turno</th>
                            <th>Acciones</th>
                            {{--<th>Fecha Nacimiento</th>
                            <th>Sexo</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Codigo de barras</th>--}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_alumno as $alumno)
                        <tr>
                            <td>{{ $bsd_alumno->perPage() * ($bsd_alumno->currentPage() - 1) + $loop->iteration }}</td>
                            <td>{{ $alumno->codigo }}</td>
                            <td>{{ $alumno->dni }}</td>
                            <td>{{ $alumno->ape_pat }}</td>
                            <td>{{ $alumno->ape_mat }}</td>
                            <td>{{ $alumno->nombres }}</td>
                            <td style="text-align: center;">@if ($alumno->proteccion_datos =='S')
                                SI @else NO
                                @endif</td>
                            <td style="text-align: center;">@if( $alumno->turno == 'M')
                                Mañana
                                @elseif ($alumno->turno == 'T')
                                Tarde
                                @endif</td>
                            {{--<td>{{ $alumno->fecha_nacimiento }}</td>
                            <td>{{ $alumno->sexo }}</td>
                            <td>{{ $alumno->celular }}</td>
                            <td>{{ $alumno->email }}</td>--}}

                            <td width="200px">
                                <div class="d-flex" style="gap: 10px">
                                    <a href="{{ route('admin.alumnos.edit', $alumno) }}"
                                        class="btn btn-sm btn-info text-nowrap">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{ route('admin.alumnos.show', $alumno) }}"
                                        class="btn btn-success btn-sm text-nowrap">
                                        <i class="fas fa-eye"></i>

                                    </a>
                                    <form action="{{route('admin.alumnos.destroyLogico', $alumno)}}" class="remover"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                            <i class="fas fa-minus-circle"></i>

                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="card-body">
            <strong>Sin registros</strong>
        </div>
        @endif
    </div>