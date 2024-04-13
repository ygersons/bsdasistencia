<div class="card">

    @if ($bsd_asistencia->count())

        <div class="card-body" style="overflow: hidden ">
            <table class="table table-striped">
                <tbody class="text-center">
                    @foreach ($bsd_asistencia as $index => $d)
                    <div class="text-center" style="background-color: rgba(223, 223, 33, 0.74) !important;" >
                          
                        <th style="background-color: #ecc100 !important">    
                                Ingreso:
                            </th>
                            <td style="background-color: #ecc100 !important">
                                {{ Carbon\Carbon::parse($d->entradaA)->format('h:i A') }}
                            </td>
                    </div>
                        
                        <tr>
                            <td>
                                <img src="{{ url('img/fotos_alumnos/' . $d->alumno->image) }}"
                                    style="width:130px;height:auto">
                            </td>
                            <td>

                                <table style="width: 100%; border-color:white " border="1">

                                    <tr>
                                        <th
                                            style="border-bottom: 1px solid #ddd; padding: 8px; text-align: center; background-color: #f2f2f2;">
                                            Alumno:
                                        </th>
                                    </tr>
                                    <tr>
                                        <td
                                            style="border-bottom: 1px solid #ddd; padding: 8px; text-align: center; background-color: white !important;">
                                            {{ $d->alumno->ape_pat }} {{ $d->alumno->ape_mat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            style="border-bottom: 1px solid #ddd; padding: 8px; text-align: center; background-color: white !important;">
                                            {{ $d->nombreA }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="card-body">
            <strong>Sin registros</strong>
        </div>
    @endif
</div>