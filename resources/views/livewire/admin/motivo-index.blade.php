<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.motivo.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <div class="card-header">
            <input wire:model.live="search" class="form-control" type="text" placeholder="Busque por nombre">
        </div>
    </div>
    @if ($bsd_motivo->count())
        <div class="card-body" style="overflow: hidden">
            <div>
                {{ $bsd_motivo->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover ">
                    <thead class="border text-center">
                        <tr>
                            <th>Item</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_motivo as $motivo)
                            <tr>
                                <td>{{ $bsd_motivo->perPage() * ($bsd_motivo->currentPage() - 1) + $loop->iteration }}
                                </td>
                                <td>{{ $motivo->nombre }}</td>
                                <td>{{ $motivo->descripcion }}</td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.motivo.edit', $motivo) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{ route('admin.motivo.show', $motivo) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-eye"></i>

                                        </a>
                                        <form action="{{ route('admin.motivo.destroyLogico', $motivo) }}" method="POST"
                                            class="remover">
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
