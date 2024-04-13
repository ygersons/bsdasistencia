<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div class='row'>
        <table width='100%' bgcolor='#fff' cellpadding='0' cellspacing='0' border='0'>
            <tr>
                <td>
                    <table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:750px; background-color:#fff;padding: 3em;'>
                        <thead>
                            <tr height='50'>
                                <th colspan='1' rowspan='2'>
                                    <img src='https://cepmm.edu.pe/templates/g5_helium/custom/images/logoMM.png' alt='Logo' title='Logo' style='height:auto; width:70%; max-width:70%;'/>
                                </th>
                                <th colspan="3" style="font-family:Verdana, Geneva, sans-serif; color:#333; font-size:24px;">IEPP "MUNDO MEJOR"</th>
                            </tr>
                            <tr height='50'>
                                <th colspan='3' style='font-family:Verdana, Geneva, sans-serif;font-style: normal;font-variant: normal;font-weight: 400;font-size:20px;border: 1px solid #000;box-shadow: -10px 10px 10px 5px black;border-radius: 10px;'>BOLETA DE DISCIPLINA</th>
                            </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <tr>
                                <td colspan='2' style='padding:15px;'>
                                    <br><br><br><p style='font-size:20px;'>Fecha</p>
                                </td>
                                <td colspan='2' style='padding:15px;'>
                                    <br><br><br>
                                    <p style='font-size:20px;'>
                                        {{ $fecha }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2' style='padding:15px;'>
                                    <p style='font-size:20px;'>Estudiante</p>
                                </td>
                                <td colspan='2' style='padding:15px;'>
                                    <p style='font-size:20px;'>
                                        {{$data_alum->ape_pat}} {{$data_alum->ape_mat}} {{$data_alum->nombres}}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2' style='padding:15px;'>
                                    <p style='font-size:20px;'>Código</p>
                                </td>
                                <td colspan='2' style='padding:15px;'>
                                    <p style='font-size:20px;'>
                                        {{$data_alum->codigo}}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2' style='padding:15px;'>
                                    <p style='font-size:20px;'>Turno:</p>
                                </td>
                                <td colspan='2' style='padding:15px;'>
                                    <p style='font-size:20px;'>
                                        {{$data_alum->turno}}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2' style='padding:15px;'>
                                    <p style='font-size:20px;'>Profesor(a)</p>
                                </td>
                                <td colspan='2' style='padding:15px;'>
                                    <p style='font-size:20px;'>
                                        {{$data_alum->asesor }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='4' style='padding:15px;'>
                                    <p style='font-size:20px;'>Falta Observada</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='4' style='padding:15px;'>
                                    <p style='font-size:20px;'>
                                        
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='4' style='padding:15px;text-align: center;'>
                                    <br><br><br><br><br><br>
                                    <p style="font-size:20px;">___________________________________<br>Firma autorizada de la IEP "Mundo Mejor"</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='4' style='padding:15px;text-align: center;'>
                                    <br><br><br><br><br><br>
                                    <p style="font-size:20px;">___________________________________<br>Apellido y Nombres del Padre de Familia</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='4' style='padding:15px;text-align: center;'>
                                    <br><br><br><br><br><br>
                                    <p style="font-size:20px;">___________________________________<br>Firma del Padre</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>