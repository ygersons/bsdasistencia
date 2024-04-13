<div class="card">
    <div class="card-header">
		<div>
            {{ $bsd_justificacion->links() }}
        </div>
        <input wire:model.live="search" class="form-control" type="text" placeholder="Busque por nombre">
    </div>
    @if ($bsd_justificacion->count())
    <div class="card-body" style="overflow: hidden">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="border">
                    <tr>
        				<th>Item</th>
                        <th>Fecha</th>
                        <th>DNI</th>
                        <th>Codigo</th>
                        <th>Justificacion</th>
                        <th>Observacion</th>
						<th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bsd_justificacion as $js)
                        <tr>
        					<td>{{ $bsd_justificacion->perPage() * ($bsd_justificacion->currentPage() - 1) + $loop->iteration }}</td>
                            <td>{{ $js->fecha_reg }}</td>
                            <td>{{ $js->dni }}</td>
                            <td>{{ $js->codigo }}</td>
                            <td>{{ $js->justificacion }}</td>
                            <td>{{ $js->observacion }}</td>
        					 <td>@if ($js->status =='A')
                                        Asistencia 
                                    @elseif ($js->status =='T')
                                        Tardanza
                                    @elseif ($js->status =='J')
                                        Justificado
                    				@else
                                        Falta
                                @endif
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




