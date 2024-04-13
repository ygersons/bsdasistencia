<div class="form-group">
    <div class="row">

        <div class="col-6">
            {!! Form::label('id_grado', 'Grado') !!}
            {!! Form::select('id_grado', $relacion, null, ['class' => 'form-control']) !!}
            @error('id_grado')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-6">
            {!! Form::label('codigo', 'Código *') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
            @error('codigo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-6">
            {!! Form::label('nombre', 'Nombre *') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-6">
            {!! Form::label('descripcion', 'Descripción') !!}
            {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}

            @error('descripcion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

    </div>
</div>


