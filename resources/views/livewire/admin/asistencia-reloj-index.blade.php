<div class="card">
    @if ($bsd_asistencia->count())
        <div id="esperando" class="text-center" style="display: none; height: 230px;">
            <img class="mt-2" src="/img/logo_mundo_mejor.png" alt="" height="200px">
        </div>
        <div id="registroAsistencia" class="card-body" style="overflow: hidden; height: 230px;">
            <table class="table table-striped">
                <tbody class="text-center">
                    @foreach ($bsd_asistencia as $index => $d)
                        <div class="card"
                            style="text-align: center; background-color: #FFC926; height: auto; width:auto; font-size:38px;">
                            <span class="fw-semibold" style="">
                                Ingreso:
                                <span style="">{{ Carbon\Carbon::parse($d->entradaA)->format('h:i A') }}</span>
                            </span>
                        </div>
                        <tr>
                            <td>
                                <table style="width: 100%; border-color:white ; font-size:30px; border=1">
                                    <tr>
                                        <th
                                            style="border-bottom: 1px solid #ddd; padding: 5px; text-align: center; background-color: #f2f2f2;">
                                            Alumno:
                                        </th>
                                    </tr>
                                    <tr>
                                        <td
                                            style="border-bottom: 1px solid #ddd; padding: 5px; text-align: center; background-color: white !important;">
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
        <div class="card-body text-center" style="height: 230px;">
            <img class="mt-2" src="/img/logo_mundo_mejor.png" alt="" height="200px">
        </div>
    @endif
</div>
