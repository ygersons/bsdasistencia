<div class="card">
    <div class="card-header" >
        <div class="card-body">
            <form action="{{ route('import-apoderado') }}" method="POST" enctype="multipart/form-data" class="mb-3">
                @csrf
                <div class="row">
                    <div class="col-md-6"> <!-- Utiliza la mitad del ancho de la fila para el formulario de importación -->
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-success">Importar datos</button>
                    </div>
                </div>
            </form>
            </div>
        <div class="card-header">
            <input wire:model.live="search" class="form-control" type="text" placeholder="Busque por nombre">
        </div>
    </div>
    @if ($bsd_apoderado->count())
        <div class="card-body" style="overflow: hidden">
            <div>
                {{ $bsd_apoderado->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover ">
                    <thead class="border text-center">
                        <tr>
                            <th>Item</th>
                            <th>Doc. ID</th>
                            <th>N° Doc.</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Nombres</th>
                            {{--<th>Celular</th>
                            <th>Email</th>
                            <th>Sexo</th>--}}
                            <th>DNI Alumno</th>
                            <th>Parentesco</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_apoderado as $apoderado)
                            <tr>
                                <td>{{ $bsd_apoderado->perPage() * ($bsd_apoderado->currentPage() - 1) + $loop->iteration }}</td>
                                <td>{{ $apoderado->doc_identidad }}</td>
                                <td>{{ $apoderado->nro_doc_iden }}</td>
                                <td>{{ $apoderado->ape_pat }}</td>
                                <td>{{ $apoderado->ape_mat }}</td>
                                <td>{{ $apoderado->nombres }}</td>
                                {{--<td>{{ $apoderado->celular }}</td>
                                <td>{{ $apoderado->email }}</td>
                                <td>{{ $apoderado->sexo }}</td>--}}
                                <td>{{ $apoderado->dni_alumno }}</td>
                                <td>{{ $apoderado->parentesco }}</td>

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
