<div class="card">
    <div class="card-body">
        <div class="card-body">
            @csrf

            <form class="form-inline float-right mr-2" action="{{ route('export', $bsd_alumno) }}" method="GET"
                id="carnetForm">
                <select class="form-control mr-1" id="filtro" name="filtro">
                    <option hidden selected>Selecciona Grado</option>
                    <option value="1A">1ro. Grado Azul</option>
                    <option value="1V">1ro. Grado Verde</option>
                    <option value="1R">1ro. Grado Rojo</option>
                    <option value="2A">2do. Grado Azul</option>
                    <option value="2V">2do. Grado Verde</option>
                    <option value="2R">2do. Grado Rojo</option>
                    <option value="3A">3er. Grado Azul</option>
                    <option value="3V">3er. Grado Verde</option>
                    <option value="3R">3er. Grado Rojo</option>
                    <option value="4A">4to. Grado Azul</option>
                    <option value="4V">4to. Grado Verde</option>
                    <option value="4R">4to. Grado Rojo</option>
                    <option value="5A">5to. Grado Azul</option>
                    <option value="5V">5to. Grado Verde</option>
                    <option value="5R">5to. Grado Rojo</option>
                </select>
                <button class="btn btn-success ml-2" type="submit">Excel </button>
            </form>

            <form class="form-inline float-right mr-2" action="{{ route('admin.alumnos.pdf.allAlumno', $bsd_alumno) }}"
                method="GET" id="carnetForm">
                 <select class="form-control mr-1" id="filtro" name="filtro">
                    <option hidden selected>Selecciona Grado</option>
                    <option value="1A">1ro. Grado Azul</option>
                    <option value="1V">1ro. Grado Verde</option>
                    <option value="1R">1ro. Grado Rojo</option>
                    <option value="2A">2do. Grado Azul</option>
                    <option value="2V">2do. Grado Verde</option>
                    <option value="2R">2do. Grado Rojo</option>
                    <option value="3A">3er. Grado Azul</option>
                    <option value="3V">3er. Grado Verde</option>
                    <option value="3R">3er. Grado Rojo</option>
                    <option value="4A">4to. Grado Azul</option>
                    <option value="4V">4to. Grado Verde</option>
                    <option value="4R">4to. Grado Rojo</option>
                    <option value="5A">5to. Grado Azul</option>
                    <option value="5V">5to. Grado Verde</option>
                    <option value="5R">5to. Grado Rojo</option>
                </select>
                <button class="btn btn-danger ml-2" type="submit">PDF </button>

            </form>

        </div>


        {{-- <script>
            $(document).ready(function() {
                // Agregar evento de cambio al elemento select
                $('#filtro').change(function() {
                    // Enviar el formulario automáticamente cuando cambie la selección
                    $('#carnetForm').submit();
                });
            });
        </script> --}}






        <div class="card-header">
            <input wire:model.live="search" class="form-control" type="search" placeholder="Busque por nombre">
        </div>
        @if ($bsd_alumno->count())
            <div class="card-body" style="overflow: hidden">
                <div>
                    {{ $bsd_alumno->links() }}
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="border">
                            <tr>
                                <th>N°</th>
                                <th>Año</th>
                                <th>codigo</th>
                                <th>DNI</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombres</th>
								<th>Proteccion datos</th>
                                {{-- <th>Fecha Nacimiento</th>
                            <th>Sexo</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Codigo de barras</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bsd_alumno as $alumno)
                                <tr>
                                    <td>{{ $bsd_alumno->perPage() * ($bsd_alumno->currentPage() - 1) + $loop->iteration }}
                                    </td>
                                    <td>{{ $alumno->anio }}</td>
                                    <td>{{ $alumno->codigo }}</td>
                                    <td>{{ $alumno->dni }}</td>
                                    <td>{{ $alumno->ape_pat }}</td>
                                    <td>{{ $alumno->ape_mat }}</td>
                                    <td>{{ $alumno->nombres }}</td>
									<td>@if ($alumno->proteccion_datos =='S')
                                        SI @else NO
                                       @endif</td>
                                    {{-- <td>{{ $alumno->fecha_nacimiento }}</td>
                                <td>{{ $alumno->sexo }}</td>
                                <td>{{ $alumno->celular }}</td>
                                <td>{{ $alumno->email }}</td> --}}


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
</div>
