<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Asistencias</title>
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
    <h1>Reporte de Asistencias</h1>
    <p>Fecha de inicio: {{ $fecha_inicio }}</p>
    <p>Fecha fin: {{ $fecha_fin }}</p>

    <table>
        <thead>
            <tr>
                <!-- Encabezados de la tabla -->
                <th>ID</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Fecha</th>
    			<th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asistencia_rpt as $asistencia)
                <tr>
                    <!-- Datos de la tabla -->
                    <td width="20px">{{ $loop->iteration }}</td>
                    <td>{{ $asistencia->dniA }}</td>
                    <td>{{ $asistencia->nombreA }}</td>
                    <td>{{ $asistencia->entradaA }}</td>
                    <td>{{ $asistencia->salidaA }}</td>
                    <td>{{ $asistencia->fechaA }}</td>
    				<td>@if ($asistencia->status =='A')
                        Asistencia
                    @elseif ($asistencia->status =='T')
                        Tardanza
                    @elseif ($asistencia->status =='J')
                        Justificado
                    @else
                        Falta
                @endif
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
