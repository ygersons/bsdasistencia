<div class="card">
    <div class="card-header">
            <input wire:model.live="search" class="form-control" type="text" placeholder="Busque por nombre">
    </div>
    @if ($bsd_horario->count())
    <div class="card-body" style="overflow: hidden">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="border text-center">
                    <tr>
						<th>Item</th>
                        <th>Nombre</th>
                        <th>Orden</th>
                        <th>Descripción</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Final</th>
                        <th>Hora Inicial</th>
                        <th>Hora Final</th>
            			<th>Activo</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($bsd_horario as $horario)
                    <tr>
                        <td>{{ $bsd_horario->perPage() * ($bsd_horario->currentPage() - 1) + $loop->iteration }}</td>
                        <td>{{ $horario->nombre }}</td>
                        <td>{{ $horario->orden }}</td>
                        <td>{{ $horario->descripcion }}</td>
                        <td>{{ \Carbon\Carbon::parse($horario->fecha_ini)->format('d/m/Y') }}</td>
						<td>{{ \Carbon\Carbon::parse($horario->fecha_fin)->format('d/m/Y') }}</td>
                        <td>{{ $horario->hora_ini }}</td>
                        <td>{{ $horario->hora_fin }}</td>
            			<td>@if ($horario->ind_vigencia =='S')
                                    SI @else NO
                                   @endif</td>
                        <td width="200px">
                            <div class="d-flex" style="gap: 10px">
                                <a href="{{ route('admin.horarios.edit', $horario) }}"
                                    class="btn btn-sm btn-info text-nowrap">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.horarios.show', $horario) }}"
                                    class="btn btn-success btn-sm text-nowrap">
                                    <i class="fas fa-eye"></i>

                                </a>

                                <form action="{{route('admin.horarios.destroy', $horario)}}" method="POST"
                                    class="eliminar">

                                    @csrf
                                    @method('delete')
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