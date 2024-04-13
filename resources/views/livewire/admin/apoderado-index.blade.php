<div class="card">
    <div class="card-header" >
        <a class="btn btn-info mb-2" href="{{ route('admin.apoderados.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
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
                            <th>DNI</th>
            				<th>Nro. Celular</th>
                            <th>Apoderado</th>
                            <th>DNI Alumno</th>
                            <th>Codigo</th>
            				<th>Alumno</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_apoderado as $apoderado)
                            <tr>
                                <td>{{ $bsd_apoderado->perPage() * ($bsd_apoderado->currentPage() - 1) + $loop->iteration }}</td>

                                <td>{{ $apoderado->nro_doc_iden }}</td>
                                <td>{{ $apoderado->celular }}</td>
                                <td>{{ $apoderado->nom_completo }}</td>

                                <td>{{ $apoderado->dni_alumno }}</td>
                                <td>{{ optional($apoderado->alumno)->codigo }}</td>
            					<td>{{ optional($apoderado->alumno)->nom_completo}} </td>

                                <td width="200px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.apoderados.edit', $apoderado) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{ route('admin.apoderados.show', $apoderado) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-eye"></i>

                                        </a>

                                        <form action="{{route('admin.apoderados.destroyLogico', $apoderado)}}"
                                        method="POST" class="remover">

                                            @csrf
                                            @method('put')
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
