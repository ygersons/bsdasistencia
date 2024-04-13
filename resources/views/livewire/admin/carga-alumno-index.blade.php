<div class="card">

    <div class="card-body">
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="mb-3">
            @csrf
            <div class="row">
                <div class="col-md-6"> <!-- Utiliza la mitad del ancho de la fila para el formulario de importación -->
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Importar datos</button>
                </div>
                <div class="col-md-6"> <!-- Utiliza la mitad del ancho de la fila para los botones de PDF y Excel -->
                    <div class="float-right">
                        <a class="btn btn-danger text-nowrap mr-2" href="{{ route('admin.alumnos.pdf.allAlumno', $bsd_alumno) }}">
                            <i class="primal"></i> PDF
                        </a>
                    </div>
                    <a class="btn btn-success float-right text-nowrap mr-2" href="{{ route('export') }}">
                        <i class="primal"></i> Excel
                    </a>
                </div>
            </div>
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
                    <thead class="border">
                        <tr>
                            <th>N°</th>
                            <th>Año</th>
                            <th>codigo</th>
                            <th>DNI</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Nombres</th>
                            
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
                                <td>{{ $alumno->anio }}</td>
                                <td>{{ $alumno->codigo }}</td>
                                <td>{{ $alumno->dni }}</td>
                                <td>{{ $alumno->ape_pat }}</td>
                                <td>{{ $alumno->ape_mat }}</td>
                                <td>{{ $alumno->nombres }}</td>

                                {{--<td>{{ $alumno->fecha_nacimiento }}</td>
                                <td>{{ $alumno->sexo }}</td>
                                <td>{{ $alumno->celular }}</td>
                                <td>{{ $alumno->email }}</td>--}}
                                
                                
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



