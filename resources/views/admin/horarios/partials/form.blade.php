<div class="form-group">
    <div class="row">
        <div class="col-6">
            {!! Form::label('nombre', 'Nombre del Horario:') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            @error('nombre')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-6">
            {!! Form::label('descripcion', 'Descripción:') !!}
            {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
            @error('descripcion')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('orden', 'Orden:') !!}
            {!! Form::select('orden', ['1' => 'Primero', '2' => 'Segundo', '3' => 'Tercero'], null,
             ['class' => 'selectpicker form-control', 'title'=>'selectOrden' ,'id'=>'orden']) !!}
            @error('orden')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('fecha_ini', 'Fecha de Inicio:') !!}
            {!! Form::date('fecha_ini', null, ['class' => 'form-control']) !!}
            @error('fecha_ini')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-6">
            {!! Form::label('fecha_fin', 'Fecha de Terminación:') !!}
            {!! Form::date('fecha_fin', null, ['class' => 'form-control']) !!}
            @error('fecha_fin')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-6">
            {!! Form::label('hora_ini', 'Hora de Inicio:') !!}
            {!! Form::text('hora_ini', null, ['class' => 'form-control']) !!}
            @error('hora_ini')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('hora_fin', 'Hora Final:') !!}
            {!! Form::text('hora_fin', null, ['class' => 'form-control']) !!}
            @error('hora_fin')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
		<div class="col-6">
        	{!! Form::label('ind_vigencia', 'Activar:') !!}
        	{!! Form::select('ind_vigencia', ['S' => 'Si', 'N' => 'No'], null,
             ['class' => 'selectpicker form-control', 'title'=>'selectVigencia' ,'id'=>'vigencia']) !!}
        	@error('ind_vigencia')
        	<span class="text-danger">{{ $message }}</span>
        	@enderror
    	</div>
    </div>
</div>
{{--<div class="form-group">
    
    <div class="row">
        <div class="col-6">
            {!! Form::label('usuario_reg', 'Usuario Reg.:') !!}
            {!! Form::text('usuario_reg', null, ['class' => 'form-control']) !!}
            @error('usuario_reg')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('usuario_act', 'Usuario Act.:') !!}
            {!! Form::text('usuario_act', null, ['class' => 'form-control']) !!}
            @error('usuario_act')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

    </div>
</div>--}}