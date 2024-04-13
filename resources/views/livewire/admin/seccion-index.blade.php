<div class="card">
    <div class="card-header" >
        <a class="btn btn-info mb-2" href="{{ route('admin.seccion.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <div class="card-header">
            <input wire:model.live="search" class="form-control" type="text" placeholder="Busque por nombre">
        </div>
    </div>
    @if ($bsd_seccion->count())
        <div class="card-body" style="overflow: hidden">
            <div>
                {{$bsd_seccion->links()}}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover ">
                    <thead class="border text-center">
                        <tr>
                            <th>Item</th>
                            <th>Grado</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_seccion as $seccion)
                            <tr>
                                <td>{{ $bsd_seccion->perPage() * ($bsd_seccion->currentPage() - 1) + $loop->iteration }}</td>
                                <td>{{ $seccion->grado->nombre }}</td>
                                <td>{{ $seccion->codigo }}</td>
                                <td>{{ $seccion->nombre }}</td>
                                <td>{{ $seccion->descripcion}}</td>

                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.seccion.edit', $seccion) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{ route('admin.seccion.show', $seccion) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-eye"></i>

                                        </a>
                                        <form action="{{route('admin.seccion.destroyLogico', $seccion)}}"
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
