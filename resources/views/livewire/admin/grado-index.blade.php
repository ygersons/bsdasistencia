<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.grado.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <div class="card-header">
            <input wire:model.live="search" class="form-control" type="text" placeholder="Busque por nombre">
        </div>
    </div>
    @if ($bsd_grado->count())
        <div class="card-body" style="overflow: hidden">
            <div>
                {{ $bsd_grado->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover ">
                    <thead class="border text-center">
                        <tr>
                            <th>Item</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_grado as $grado)
                            <tr>
                                <td>{{ $bsd_grado->perPage() * ($bsd_grado->currentPage() - 1) + $loop->iteration }}
                                </td>
                                <td>{{ $grado->codigo }}</td>
                                <td>{{ $grado->nombre }}</td>
                                <td>{{ $grado->descripcion }}</td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.grado.edit', $grado) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{ route('admin.grado.show', $grado) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-eye"></i>

                                        </a>
                                        <form action="{{ route('admin.grado.destroyLogico', $grado) }}" method="POST"
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
