<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Alumno</title>
    <style>
        body {
            font-size: 15px;
        }

        h1 {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: right;
            margin-bottom: 10px;
        }

        hr {
            border: 1px solid #000000;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #000;
        }

        .barcode {
            text-align: center;
            margin-top: 20px;
        }

        .barcode img {
            max-width: 100%;
        }
    </style>
</head>

<body>
    <h1>Reporte de Alumnos</h1>
    <?php
    date_default_timezone_set('America/Lima');
    $date = date('d/m/Y h:i A');
    ?>
    <p>Fecha impresión: {{ $date }}</p>
    <hr>
    <table class="table">
        <tr>
            <th>N°</th>
            <th>Año</th>
            <th>Código</th>
            <th>DNI</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Nombres</th>
            <th>Turno</th>
        </tr>
        @foreach ($bsd_alumno as $alumno)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $alumno->anio }}</td>
            <td>{{ $alumno->codigo }}</td>
            <td>{{ $alumno->dni }}</td>
            <td>{{ $alumno->ape_pat }}</td>
            <td>{{ $alumno->ape_mat }}</td>
            <td>{{ $alumno->nombres }}</td>
            <td>{{ $alumno->turno }}</td>
        </tr>
        @endforeach
    </table>

    <style>
        .page-break {
            page-break-after: always;
        }
    </style>

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 800, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>
</body>

</html>