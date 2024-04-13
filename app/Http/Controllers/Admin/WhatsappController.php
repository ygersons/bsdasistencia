<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdAlumno;
use App\Models\BsdApoderado;
use App\Models\BsdAsistencia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.whatsapp.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function enviarWsp(Request $request)
    {
        //dd($request);
        $params = [
            'token' => '3mzuhywncek5tdda',
            'to' => $request->phone,
            'body' => $request->message,
        ];
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.ultramsg.com/instance79954/messages/chat',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_HTTPHEADER => ['content-type: application/x-www-form-urlencoded'],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            //echo 'cURL Error #:' . $err;
            return redirect()->route('admin.whatsapp.index')->with('msj-whastapp', 'error');
        } else {
            //echo $response;
            return redirect()->route('admin.whatsapp.index')->with('msj-whastapp', 'enviado');
        }
    }
	public function asistenciaWsp(Request $request)
    {
        date_default_timezone_set('America/Lima');
        $fechaActual = date('Y-m-d');
        $apoderadoW = BsdApoderado::where('dni_alumno',$request->estudiante)->get();
        $apodConsult = $apoderadoW[0];
        $alumnoW = BsdAlumno::where('dni', $request->estudiante)->get();
        $alumConsult = $alumnoW[0];
        $asistenciaW = BsdAsistencia::where('dniA', '=', $request->estudiante)
        ->where('fechaA', '=', $fechaActual)->get();
        $asistConsult = $asistenciaW[0];
        $fechamsg= date('d/m/Y');
        $horamsg = date('h:i a');
        if ($asistConsult->status == 'A') {
            $mensaje = 'Buen día su hijo(a) ' . $alumConsult->nombres.' - '.$alumConsult->codigo
            .' Ingresó a la I.E.P.P. Mundo Mejor'.'\n'.$fechamsg.' '.$horamsg;
        } elseif($asistConsult->status  == 'T') {
            $mensaje = 'Buen día su hijo(a) ' . $alumConsult->nombres.' - '.$alumConsult->codigo
            .' Ingresó Tarde a la I.E.P.P. Mundo Mejor'.'\n'.$fechamsg.' '.$horamsg;
        }elseif($asistConsult->status  == 'F') {
            $mensaje = 'Buen día su hijo(a) '.$alumConsult->nombres.' - '.$alumConsult->codigo
            .' No Asistió a la I.E.P.P. Mundo Mejor'.'\n'.$fechamsg.' '.$horamsg;
        }
        $params = [
            'token' => '3mzuhywncek5tdda',
            'to' => $apodConsult->celular,
            'body' => $mensaje,
        ];
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.ultramsg.com/instance79954/messages/chat',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_HTTPHEADER => ['content-type: application/x-www-form-urlencoded'],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
    }
	public function envioPdf(Request $request)
    {
    	date_default_timezone_set('America/Lima');
        $fechamsg= Carbon::now('America/Lima')->format('d/m/Y');
        $horamsg = Carbon::now('America/Lima')->format('h:m a');
    	$fecha = Carbon::now('America/Lima')->toDateString();
        $apoderadoW = BsdApoderado::where('dni_alumno', '=', $request->estudiante)->get();
        $apodConsult = $apoderadoW[0];
        $alumnoW = BsdAlumno::where('dni', '=', $request->estudiante)->get();
        $alumConsult = $alumnoW[0];
        $nombrePdf = 'Boleta_' . $alumConsult->codigo . '_' . $fecha . '.pdf';
        $ruta = 'https://yuin21.com/boleta_disciplina/'.$nombrePdf;
        $params=array(
            'token' => '3mzuhywncek5tdda',
            'to' => $apodConsult->celular,
            'filename' => $nombrePdf,
            'document' => $ruta,
            'caption' => $fechamsg.' '.$horamsg.'\n'.'Buen día su hijo(a) '.$alumConsult->nombres . 
            ' Ingresó Tarde a la I.E.P.P. Mundo Mejor'
            );
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.ultramsg.com/instance79954/messages/document",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => http_build_query($params),
              CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
              ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            echo $response;
            }
        
    }
}
