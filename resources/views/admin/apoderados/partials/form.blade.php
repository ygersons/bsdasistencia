<div class="form-group">
    <div class="row">
        <div class="col-6">
            {!! Form::label('doc_identidad', 'Tipo Documento:') !!}
            {!! Form::select('doc_identidad', ['DNI' => 'DNI', 'RUC' => 'REG. UNICO DE CONTRIBUYENTES',
            'CEX' => 'CARNET DE EXTRANJERIA'], null,
             ['class' => 'selectpicker form-control', 'title'=>'selectSexo' ,'id'=>'sexo']) !!}
            @error('doc_identidad')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('nro_doc_iden', 'Numero de Documento:') !!}
            {!! Form::text('nro_doc_iden', null, ['class' => 'form-control','maxlength' => '8']) !!}
            @error('nro_doc_iden')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('ape_pat', 'Apellido Paterno:') !!}
            {!! Form::text('ape_pat', null, ['class' => 'form-control']) !!}
            @error('ape_pat')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('ape_mat', 'Apellido Materno:') !!}
            {!! Form::text('ape_mat', null, ['class' => 'form-control']) !!}
            @error('ape_mat')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('nombres', 'Nombres:') !!}
            {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
            @error('nombres')
                    <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('celular', 'Celular:') !!}
            {!! Form::text('celular', null, ['class' => 'form-control']) !!}
            @error('celular')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            {!! Form::label('email', 'Correo electronico:') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('sexo', 'Sexo:') !!}
            {!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino'], null,
             ['class' => 'selectpicker form-control', 'title'=>'selectSexo' ,'id'=>'sexo']) !!}
            @error('sexo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('dni_alumno', 'DNI del Alumno:') !!}
            {!! Form::text('dni_alumno', null, ['class' => 'form-control','maxlength' => '8']) !!}
            @error('dni_alumno')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('parentesco', 'Parentesco:') !!}
            {!! Form::select('parentesco', ['Padre' => 'Padre', 'Madre' => 'Madre',
            'Abuelo' => 'Abuelo', 'Abuela' => 'Abuela','Apoderado' => 'Apoderado', 'Otro' => 'Otro',], null,
             ['class' => 'selectpicker form-control', 'title'=>'selectParentesco' ,'id'=>'parentesco']) !!}
            @error('parentesco')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
    </div>
</div>