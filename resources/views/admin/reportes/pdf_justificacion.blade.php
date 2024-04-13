<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Justificaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Reporte de Justificaciones</h1>

    <p><strong>Fecha de inicio:</strong> {{ $fecha_inicio }}</p>
    <p><strong>Fecha fin:</strong> {{ $fecha_fin }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>DNI</th>
                <th>Fecha de Registro</th>
                <th>Justificación</th>
                <th>Observación</th>
                <th>Vigencia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($justificacion_rpt as $justificacion)
                <tr>
                    <td>{{ $justificacion->id }}</td>
                    <td>{{ $justificacion->codigo }}</td>
                    <td>{{ $justificacion->dni }}</td>
                    <td>{{ $justificacion->fecha_reg }}</td>
                    <td>{{ $justificacion->justificacion }}</td>
                    <td>{{ $justificacion->observacion }}</td>
                    <td>{{ $justificacion->ind_vigencia }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
