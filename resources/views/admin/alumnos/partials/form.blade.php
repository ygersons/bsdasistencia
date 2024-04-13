<div class="form-group">
    <div class="row">
        <div class="col-4">
            {!! Form::label('anio', 'Año *') !!}
            {!! Form::text('anio', null, ['class' => 'form-control']) !!}
            @error('anio')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-4">
            {!! Form::label('codigo', 'Codigo de alumno *') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control','maxlength' => '4']) !!}
            @error('codigo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-4">
            {!! Form::label('dni', 'DNI *') !!}
            {!! Form::text('dni', null, ['class' => 'form-control','maxlength' => '8']) !!}
            @error('dni')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            {!! Form::label('nombres', 'Nombres *') !!}
            {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
            @error('nombres')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-4">
            {!! Form::label('ape_pat', 'Apellido Paterno *') !!}
            {!! Form::text('ape_pat', null, ['class' => 'form-control']) !!}
            @error('ape_pat')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-4">
            {!! Form::label('ape_mat', 'Apellido Materno *') !!}
            {!! Form::text('ape_mat', null, ['class' => 'form-control']) !!}
            @error('ape_mat')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento') !!}
            {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control']) !!}
            @error('fecha_nacimiento')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-4">
            {!! Form::label('sexo', 'Sexo *') !!}
            {!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['class' => 'selectpicker
            form-control', 'title'=>'seleccionar' ,'id'=>'sexo']) !!}
            @error('sexo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-4">
            {!! Form::label('turno', 'Turno') !!}
            {!! Form::select('turno', ['M' => 'Mañana', 'T' => 'Tarde'], null, ['class' => 'selectpicker
            form-control', 'title'=>'seleccionar' ,'id'=>'turno']) !!}

            @error('turno')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            {!! Form::label('celular', 'Celular') !!}
            {!! Form::text('celular', null, ['class' => 'form-control']) !!}

            @error('celular')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-4">
            {!! Form::label('email', 'Email *') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}

            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-4">
            {!! Form::label('proteccion_datos', 'Proteccion de Datos') !!}
            {!! Form::select('proteccion_datos', ['S' => 'Si', 'N' => 'No'], null,
            ['class' => 'selectpicker form-control','id'=>'protec_datos']) !!}
            @error('proteccion_datos')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-8">

            {!! Form::label('image', 'Foto: (25 caracteres como max.)') !!}

            {!! Form::file('image',['class' => 'form-control']) !!}

            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>