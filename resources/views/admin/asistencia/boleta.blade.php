<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <style type="text/css">
        @page {
            margin-top: 0;
            margin-left: 15px;
            margin-right: 15px;
            margin-bottom: 0;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        table {
            border-collapse: separate;
            border-spacing: 1;
            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
        }

        td {
            width: 100%;
            font-size: 10px;
            padding: 2px 0 2px 0;
            margin: 2px 0 2px 0;
        }

        th {
            text-align: center;
        }

        .boleta {
            font-size: 10px;
            text-align: center;
            height: auto;
            border: solid black 2px;
            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            padding: 0;
            margin: 0;
        }

        .linea {
            border-bottom: 1px solid black;
        }
        .li-up{
            border-top: 0.5px solid black;
            margin: 0 40px 0 40px; 
        }

    </style>

</head>

<body>
    <table align='center' width='100%' border='0' cellpadding='0' cellspacing='0'>
        <thead>
            <tr>
                <th colspan='' rowspan='2' style="width:55px; height: 55px;">
                    <img src='https://cepmm.edu.pe/templates/g5_helium/custom/images/logoMM.png' alt='Logo'
                        title='Logo' style='height:auto; width:90%;' />
                </th>
                <th colspan="" style="font-size:10px;">IEPP "MUNDO MEJOR"</th>
            </tr>s
            <tr>
                <th colspan="" class="boleta" style="font-size:10px;">BOLETA DE DISCIPLINA</th>
            </tr>
        </thead>
        <div style="height: 10px;"></div>
        <tbody>

            <tr>
                <td style=''>
                    Fecha:
                </td>   
                <td style=''>
                    <div class="linea">
                		{{Carbon\Carbon::now('America/Lima')->format('d/m/Y h:m a')}}
                    </div>
                </td>
            </tr>
            <tr>
                <td style=''>
                    Estudiante:
                </td>
                <td>
                    <div class="linea">{{ $alumno->ape_pat }} {{ $alumno->ape_mat }} {{ $alumno->nombres }}</div>
                </td>
            </tr>
            <tr>
                <td style=''>
                    Código:
                </td>
                <td style=''>

                    <div class="linea">{{ $alumno->codigo }}</div>

                </td>
            </tr>
            <tr>
                <td style=''>
                    Turno:
                </td>
                <td style=''>

                    <div class="linea">{{ $alumno->turno }}</div>

                </td>
            </tr>
            <br>
            {{--<tr>
                <td style=''>
                    Profesor(a):
                </td>
                <td style=''>
                    <div class="linea">{{ $alumno->asesor }}</div>
                </td>
            </tr>--}}
            <tr>
                <td colspan="4" style=''>
                    Falta Observada:
                </td>
            </tr>
            <tr>
                <td colspan="4" style='align-items: center;'>
                    <div style="color: blue">
                        Señor padre de Familia se le comunica que el estudiante ingresó tarde a la institución.
                    </div>

                </td>
            </tr>
            <br>
            <tr>
                <td colspan='6' style='text-align: center; font-size: 8px;'>
                    <div class="li-up">
                        Firma autorizada de la IEPP "Mundo Mejor"
                    </div>
                </td>
            </tr>
            <br>
            <tr>
                <td colspan='6' style='text-align: center;font-size: 8px;'>
                    <div style="text-align: center; color: blue">{{ $apoderado->ape_pat }} {{ $apoderado->ape_mat }} {{ $apoderado->nombres }}</div>
                    <div class="li-up">Apellido y Nombres del Padre de Familia</div>
                </td>
            </tr>
            <br>
            <tr>
                <td colspan='6' style='text-align: center;font-size: 8px;'>
                    <div class="li-up">Firma del Padre</div>
                </td>
            </tr>
        </tbody>
    </table>
    <div style="margin-top: 7px">
        <div class="fw-bolder" style="font-size: 9px;">
            El estudiante devolverá firmada esta boleta el dia siguiente en secretaria antes de iniciar sus
            clases.
        </div>

    </div>
</body>

</html>