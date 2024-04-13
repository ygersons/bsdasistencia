<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
{!! Form::label(null, 'Lista de permisos') !!}
{{-- <h2 class="h3">Lista de permisos</h2> --}}
<div class="form-group border rounded-lg p-2 row mb-4">
    @foreach ($permissions as $permission)
        @if (strpos($permission->name, 'adminlt') !== false)
            <div class="col-lg-3 col-sm-6">
                <h6 style="font-weight: bold; margin: 20px">{{ $permission->description }}</h6>
                <hr>
                <ul class="list-group">
                @else
                    <li class="list-group-item" style="border:0px">
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                        {{ $permission->description }}
                    </li>
        @endif
        @if (strpos($permission->name, 'indexf') !== false)
            </ul>
</div>
@endif
@endforeach
</div>