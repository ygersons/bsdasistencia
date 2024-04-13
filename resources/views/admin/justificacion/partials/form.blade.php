<div class="form-group">
    <div class="row">

        <div class="col-6">
            {!! Form::label('codigo', 'Código *') !!}
            {!! Form::text('codigo', null, ['id' => 'codigo', 'class' => 'form-control', 'list' => 'alumnoCodigos']) !!}
            <datalist id="alumnoCodigos">
                @foreach ($alumnoCodigos as $codigo)
                    <option value="{{ $codigo }}">
                @endforeach
            </datalist>
            @error('codigo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-6">
            {!! Form::label('dni', 'DNI ') !!}
            {!! Form::text('dni', null, ['id' => 'dni', 'class' => 'form-control','readonly' => 'readonly']) !!}
            @error('dni')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-6">
    	{!! Form::label('fecha_reg', 'Fecha Registro') !!}
    	{!! Form::date('fecha_reg', \Carbon\Carbon::now(), ['class' => 'form-control','readonly' => 'readonly']) !!}

   		 @error('fecha_reg')
        	<span class="text-danger">{{ $message }}</span>
    	@enderror
		</div>

        <div class="col-6">
            {!! Form::label('justificacion', 'Justificación *') !!}
            {!! Form::select('justificacion', $relacion, null, ['class' => 'form-control']) !!}
            @error('justificacion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-6">
            {!! Form::label('ape_pat', 'Apellido Paterno') !!}
            {!! Form::text('ape_pat', null, ['class' => 'form-control', 'id' => 'ape_pat','readonly' => 'readonly']) !!}
        </div>

        <div class="col-6">
            {!! Form::label('ape_mat', 'Apellido Materno') !!}
            {!! Form::text('ape_mat', null, ['class' => 'form-control', 'id' => 'ape_mat','readonly' => 'readonly']) !!}
        </div>

        <div class="col-6">
            {!! Form::label('nombres', 'Nombres') !!}
            {!! Form::text('nombres', null, ['class' => 'form-control', 'id' => 'nombres','readonly' => 'readonly']) !!}
        </div>




        <div class="col-6">
            {!! Form::label('observacion', 'Observación *') !!}
            {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
            @error('observacion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


    </div>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#codigo').on('input', function() {
            var codigo = $(this).val();
            if (codigo !== '') {
                // Realizar la solicitud AJAX para obtener los datos del alumno
                $.ajax({
                    url: "{{ route('buscar.alumno') }}", // Ruta definida en las rutas
                    type: 'GET',
                    data: {
                        term: codigo
                    },
                    success: function(response) {
                        // Verificar si se recibió una respuesta válida
                        if (response.length > 0) {
                            // Autocompletar los campos correspondientes con los valores obtenidos
                            $('#ape_pat').val(response[0].ape_pat);
                            $('#ape_mat').val(response[0].ape_mat);
                            $('#nombres').val(response[0].nombres);
                            $('#dni').val(response[0].dni); // Autocompletar el campo de DNI
                        } else {
                            // Limpiar los campos si no se recibió una respuesta válida
                            $('#ape_pat').val('');
                            $('#ape_mat').val('');
                            $('#nombres').val('');
                            $('#dni').val(''); // Limpiar el campo de DNI
                        }
                    },
                    error: function() {
                        // Manejar errores de la solicitud AJAX si es necesario
                        // Por ejemplo, puedes limpiar los campos
                        $('#ape_pat').val('');
                        $('#ape_mat').val('');
                        $('#nombres').val('');
                        $('#dni').val('');
                    }
                });
            } else {
                // Limpiar los campos si el campo de código está vacío
                $('#ape_pat').val('');
                $('#ape_mat').val('');
                $('#nombres').val('');
                $('#dni').val('');
            }
        });
    });
</script>
