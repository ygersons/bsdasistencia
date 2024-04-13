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
        margin: 0px
	    }   
        .table {
        	border-collapse:separate;
            border-spacing: 1;
            border:solid #DA251D 5px;
            border-radius:10px;
            -moz-border-radius:10px;
            -webkit-border-radius: 5px;       
            width : 321.5px;
            height: 193px;
            margin: 0px
        }
        p {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-size: 100%;
            margin-bottom: 2;          
        }
    </style>

</head>
    <body>
        <table><tbody>
            @foreach ($bsd_alumno as $alumno)
            <table class="table">
                <th>
                    <img src="{{asset('img/logo_mundo_mejor.png')}}" style="width:52;height:auto; margin-bottom: 10px">
                </th>
                <th>
                    <p class="fw-bolder" style="font-family: Bookman Old Style, Georgia, serif; font-weight: bold;margin-top: 5px; margin-left:-12px ; font-size: 17px">I.E.P.P. MUNDO MEJOR</p>
                    <p class="fw-bolder" style=" color: #D90000; margin-left:-12px;font-size: 17px">CARNÉ DE IDENTIDAD</p>
                    <p class="fw-bolder" style=" color: #D90000; margin-left:-12px; font-size: 17px; margin-top: -5px;">AÑO {{ $alumno->anio }}</p>
                </th>

                <tr>
                    <img src="{{url('img/fotos_alumnos/'.$alumno->image)}}"
                        style="width:80px;height:95px;margin: -8px 0 3px 2px">
                    <td>
                       <p class="text-uppercase fw-bold" style="font-size: 15px; margin-left:-10px; margin-top: -8px">{{ $alumno->ape_pat }} {{ $alumno->ape_mat }}</p>
                        @if (strlen($alumno->nombres) > 23)
                        <p class="text-uppercase fw-bold" style="font-size: 12.5px;margin-left:-10px; margin-top: -2px">{{ $alumno->nombres }}</p>
                        @else
                        <p class="text-uppercase fw-bold" style="font-size: 15px;margin-left:-10px; margin-top: -2px">{{ $alumno->nombres }}</p>
                        @endif
                        <p class="fw-bolder" style="color: #0059B2;font-size: 16px;margin-left:-10px; margin-top: -2px">{{ $alumno->codigo }}</p>
                        <div class="text-center" style="margin-top: -2px">
                            <img class="rounded" width="210" height="40" src="{{url('img/cod_bar/'.$alumno->dni.'.png')}}" alt="">                   
                        </div>
                    </td>
                </tr>

            </table>
   
            <div style="page-break-after:always;"></div>

            <table class="table">
            <th>
                <img src="{{asset('img/logoCongregacion.png')}}" style="width:50;height:auto; margin: 5px 0px">
            </th>
            <td>
            <div class="fw-bolder" style="position: relative;  font-size: 11px; color: #0059B2; margin: 5px 0px 0px -8px;">PERMISO USO DE DATOS E IMÁGENES:
				<spam> @if ($alumno->proteccion_datos =='S')
                <spam style="color: #0059B2">SI</spam>
                	@else  
                	<spam style="color: #DA251D">NO</spam>
                @endif 
                </spam>
                </div>
                <div style="position: relative; width:210px ; height:auto ; margin:6px 0px 0px 4px">
                    <p class="fst-italic" style="font-size: 10;text-align: justify">El presente carné sirve como identificación y otros
                        servicios que ofrece la I.E.P.P. Mundo Mejor</p>
                    <p class="fw-bolder" style="font-size: 12px;margin-top: 10px">ESTE CARNÉ ES INTRANSFERIBLE</p>
                </div>
                <img src="{{asset('img/firma.png')}}" style="width: 260px; height:auto;margin: 6px 0px 0px -44px">
            </td>   
            </table>
            <div style="page-break-after:always;"></div>
        @endforeach    
        </tbody></table>
    </body>
</html>
