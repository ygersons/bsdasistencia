<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo PDF de Personal</title>
    <style>
        body {
            font-size: 15px;
        }

        h1 {
            font-weight: bold;
        }

        .table thead {
            background: rgb(196, 196, 196);
            border-bottom: 1px solid gray;
        }

        .table thead th {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .table tbody td {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .table tbody tr {
            border-bottom: 1px solid rgb(196, 196, 196);
        }

    </style>
</head>

<body>
    <h1 style="text-align:center">Carnet de alumno</h1>
    <?php
    date_default_timezone_set('America/Lima')
    ?>
    <p style="text-align:right">Fecha impresion: {{ $date = date('d/m/Y h:i A')}}</p>
    <hr color="#000000">
    <table class="table">
        <thead>
            <tr>
                
                <th>Año</th>
                <th>codigo</th>
                <th>DNI</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombres</th>
                <th>Codigo</th>
                {{-- <th>Fecha Nacimiento</th>
                <th>Sexo</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Codigo de barras</th> --}}
            </tr>
        </thead>
        <tbody>    
                <tr>   
                    <td>{{ $alumno->anio }}</td>
                    <td>{{ $alumno->codigo }}</td>
                    <td>{{ $alumno->dni }}</td>
                    <td>{{ $alumno->ape_pat }}</td>
                    <td>{{ $alumno->ape_mat }}</td>
                    <td>{{ $alumno->nombres }}</td>
                    <td>
                        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($alumno->dni, 'C128') }}" alt="barcode" />
                        {{-- <img class="img-fluid" src="{!! DNS1D::getBarcodePNGPath($alumno->dni,'C128') !!}" alt="barcode"> --}}
                    </td>
                    {{-- <td>{{ $alumno->fecha_nacimiento }}</td>
                                    <td>{{ $alumno->sexo }}</td>
                                    <td>{{ $alumno->celular }}</td>
                                    <td>{{ $alumno->email }}</td> --}}

                </tr>
            
        </tbody>
    </table>
</body>
</body>
</html>
