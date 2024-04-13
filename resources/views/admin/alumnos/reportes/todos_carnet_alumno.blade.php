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
        .table {
            border-radius: 10px;
            border: 5px solid #B22D00;
            width: 326px;
            height: 204px;
        }

        p {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-size: 100%;
            margin-bottom: 3;
        }
    </style>

</head>

@foreach ($bsd_alumno as $alumno)

    <body>
        <div class="table float-start ">

            <table>
                <th>
                    <img src="./img/logo_mundo_mejor.png" style="width:55;height:auto; margin-bottom: 13.5px">
                </th>

                <th>
                    <p class="fw-bolder" style="margin-top: 5px; font-size: 19px">I.E.P.P. MUNDO MEJOR</p>
                    <p class="fw-bolder" style=" color: #D90000; font-size: 19px">CARNÉ DE IDENTIDAD</p>
                    <p class="fw-bolder" style=" color: #D90000; font-size: 19px; margin-top: -5px;">AÑO
                        {{ $alumno->anio }}</p>
                </th>

                <tr>
                    <img src="./img/fotos_alumnos/foto-carnet.jpg"
                        style="width:75px;height:100px;margin: -10px 0 6px 2px">
                    <td>
                        <p class="text-uppercase fw-bold" style="font-size: 15px; margin-top: -10px">
                            {{ $alumno->ape_pat }} {{ $alumno->ape_mat }}</p>
                        <p class="text-uppercase fw-bold" style="font-size: 15px; margin-top: -5px">
                            {{ $alumno->nombres }}</p>
                        <p class="fw-bolder" style="color: #0059B2;font-size: 16px;margin-top: -5px">
                            {{ $alumno->codigo }}</p>
                        <div class="text-center" style="margin-top: -2px">
                            <img class="rounded" width="210" height="40"
                                src="./img/cod_bar/{{ $alumno->dni }}.png" alt="">
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="table float-end">

            <table style='width:326px;height:204px;'>
                <th>
                    <img src="./img/carne/logoCongregacion.png" style="width:50;height:auto; margin: 5px">
                </th>
                <td>
                    <p class="fw-bolder" style=" font-size: 14px; color: #0059B2; margin-top: 7px;">PERMISO USO DE
                        DATOS
                        E IMÁGENES:
                        <samp style="color: #D90000">
                            @if ($alumno->proteccion_datos == 'S')
                                SI
                            @else
                                NO
                            @endif
                        </samp>
                    </p>
                    <p class="fst-italic" style="font-size: 9;text-align: left">El presente carné sirve como
                        identificación y otros
                        servicios que ofrece la I.E.P.P. Mundo Mejor</p>
                    <p class="fw-bolder" style="font-size: 13px;margin-top: 11px">ESTE CARNÉ ES INTRANSFERIBLE</p>
                    <img src="./img/carne/firma.png">
                </td>
            </table>
        </div>
    </body>
@endforeach

</html>
