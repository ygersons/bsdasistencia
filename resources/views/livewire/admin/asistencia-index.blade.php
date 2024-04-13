<div class="card">
    <div class="card-header">
		<div>
            {{ $bsd_asistencia->links() }}
        </div>
        <input wire:model.live="search" class="form-control" type="text" placeholder="Busque por nombre">
    </div>
    @if ($bsd_asistencia->count())
    <div class="card-body" style="overflow: hidden">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
        			<th>Item</th>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Fecha</th>
                    <th>Estatus</th>
                </thead>
                <tbody>
                    @foreach ($bsd_asistencia as $d)
                        <tr>
        					<td>{{ $bsd_asistencia->perPage() * ($bsd_asistencia->currentPage() - 1) + $loop->iteration }}</td>
                            <td>{{$d->dniA}}</td>
                            <td>{{$d->nombreA}}</td>
                            <td>{{$d->entradaA}}</td>
                            <td>{{$d->salidaA }}</td>
                            <td>{{ \Carbon\Carbon::parse($d->fechaA)->format('d/m/Y') }}</td>
                             <td>@if ($d->status =='A')
                                        Asistencia 
                                    @elseif ($d->status =='T')
                                        Tardanza
                                    @elseif ($d->status =='J')
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