<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdAlumno;
use App\Mail\SampleMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function create($dataEmail = null){
        $bsd_alumno =BsdAlumno::inRandomOrder()->limit(1)->first();

        $slug = base64_encode(strtotime(date("Y-m-d H:i:s")).'_'.uniqid());
        $data = [
            'fecha' => date("Y-m-d H:i:s"),
            'data_alum' => $bsd_alumno,
        ];
        $ruta = './pdf_disciplina/';
		if (!is_dir($ruta)) {
			mkdir($ruta);
		}
        $ruta_compl = $ruta.''.$slug.'_'.$bsd_alumno->dni.'.pdf';
        $pdf = PDF::loadView('emails.discipline_pdf', $data)->save($ruta_compl);

        $DataEmailCliente = [
            'emailSubject'      => 'Notificación Boleta de disciplina',
            'emailAddress'      => $dataEmail,
            'data'              => $data,
            "pdf"               => $pdf,
        ];

        $ResultEmailCliente = $this->composeEmail($DataEmailCliente);

        $response = array(
            'status' => 'success',
            'msg' => 'Envio realizado correctamente!',
            'data' => '',
        );
        return response()->json($response);
    }

    public function composeEmail($data) {
        
        $content = [
            'subject' => $data['emailSubject'],
            'body' => $data['data'],
            'pdf' => $data['pdf'],
        ];

        Mail::to($data['emailAddress'])->send(new SampleMail($content));
    }

    public function GeneracionBoletaDisciplinaPDF($data = null)
	{
        $slug = base64_encode(strtotime(date("Y-m-d H:i:s")).'_'.uniqid());
		$arrFile = [];
		$htmltable_add = '';
		$cuentadata = '';
		$espacios = '';
		$arrFile['ruta'] = './';
		if (!is_dir($arrFile['ruta'])) {
			mkdir($arrFile['ruta']);
		}
		$arrFile['ruta'] = './pdf_disciplina/';
		if (!is_dir($arrFile['ruta'])) {
			mkdir($arrFile['ruta']);
		}

		$body =
			'<!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
                    <meta http-equiv="Pragma" content="no-cache" />
                    <meta http-equiv="Expires" content="0" />
                    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                    <title>Boleta de disciplina</title>
                    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
                    <link rel="stylesheet" href="../ic_libs/boostrap/bootstrap.min.css" type="text/css" />
                    <style>
                        .tablesb, .tdsb, .theadsb{                    
                            border: 0px solid black !important;
                        }
                        .text-pddg-50{
                            padding-left: 50px !important;
                        }
                        .text-pddg-20{
                            padding-left: 20px !important;
                        }
                        
                        @media screen and (max-width: 730px) {
                            .tbprov {
                                float: left;
                            }
                            .tbcmpr {
                                float: right;
                            }
                            .col-md-4{
                                width: 30%;
                            }
                            .col-md-6{
                                width: 50%;
                            }
                        }
                        footer {
                            position: fixed; 
                            bottom: 0cm; 
                            left: 0cm; 
                            right: 0cm;
                            height: 2cm;
                            line-height: 1.5cm;
                            font-size:12px;
                        }
                    </style>
                </head>
                <body style="margin-left:80px !important;margin-right:80px !important;">
                    <main>
                        <div class="box-body">
                            <table width="100%" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td>
                                        <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0" style="max-width:750px; background-color:#fff;padding: 3em;">
                                            <thead>
                                                <tr height="50">
                                                    <th colspan="1" rowspan="2">
                                                        <img src="https://cepmm.edu.pe/templates/g5_helium/custom/images/logoMM.png" alt="Logo" title="Logo" style="height:auto; width:70%; max-width:70%;"/>
                                                    </th>
                                                    <th colspan="3" style="font-family:Verdana, Geneva, sans-serif; color:#333; font-size:24px;">IEPP "MUNDO MEJOR"</th>
                                                </tr>
                                                <tr height="50">
                                                    <th colspan="3" style="font-family:Verdana, Geneva, sans-serif;font-style: normal;font-variant: normal;font-weight: 400;font-size:20px;border: 1px solid #000;box-shadow: -10px 10px 10px 5px black;border-radius: 10px;">BOLETA DE DISCIPLINA</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <td colspan="2" style="padding:15px;">
                                                    <br><br><br>
                                                    <p style="font-size:20px;">Fecha</p>
                                                  </td>
                                                  <td colspan="2" style="padding:15px;">
                                                    <p style="font-size:20px;">
                                                      '.(date("Y-m-d H:i:s")).'
                                                    </p>
                                                  </td>
                                              </tr>
                                              <tr>
                                                <td colspan="2" style="padding:15px;">
                                                  <p style="font-size:20px;">Estudiante</p>
                                                </td>
                                                <td colspan="2" style="padding:15px;">
                                                  <p style="font-size:20px;">
                                                    datos
                                                  </p>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="2" style="padding:15px;">
                                                  <p style="font-size:20px;">Código</p>
                                                </td>
                                                <td colspan="2" style="padding:15px;">
                                                  <p style="font-size:20px;">
                                                    datos
                                                  </p>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="2" style="padding:15px;">
                                                  <p style="font-size:20px;">Turno:</p>
                                                </td>
                                                <td colspan="2" style="padding:15px;">
                                                  <p style="font-size:20px;">
                                                    datos
                                                  </p>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="2" style="padding:15px;">
                                                  <p style="font-size:20px;">Profesor(a)</p>
                                                </td>
                                                <td colspan="2" style="padding:15px;">
                                                  <p style="font-size:20px;">
                                                    datos
                                                  </p>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" style="padding:15px;">
                                                  <p style="font-size:20px;">Falta Observada</p>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" style="padding:15px;">
                                                  <p style="font-size:20px;">
                                                    datos
                                                  </p>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" style="padding:15px;text-align: center;">
                                                  <br><br>
                                                  <p style="font-size:20px;">
                                                    ___________________________________<br>
                                                    Firma autorizada de la IEP "Mundo Mejor"
                                                  </p>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" style="padding:15px;text-align: center;">
                                                  <br><br>
                                                  <p style="font-size:20px;">___________________________________<br>
                                                    Apellido y Nombres del Padre de Familia
                                                  </p>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" style="padding:15px;text-align: center;">
                                                  <br><br>
                                                  <p style="font-size:20px;">
                                                    ___________________________________<br>
                                                    Firma del Padre
                                                  </p>
                                                </td>
                                              </tr>                  
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        </main>
                    <footer>            
                        <div class="box-body">
                            <div class="row">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <table class="table table-condensed table-bordered text-center tablesb">
                                            <tr>
                                                <td class="text-center tdsb">
                                                    El estudiante devolverá firmada esta boleta el dia siguiente en secretaria antes de iniciar sus clases.
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </body>
            </html>';

		$dompdf = new Dompdf();
		$dompdf->set_paper("A4", "portrait");
		$dompdf->loadHtml($body);
		$dompdf->render();
		$canvas = $dompdf->get_canvas();
		$footer = $canvas->open_object();
		$w = $canvas->get_width();
		$h = $canvas->get_height();
		$canvas->page_text($w - 562, $h - 28, "Generado por: IEPP Mundo mejor", $dompdf->getFontMetrics()->get_font("helvetica", "bold"), 8);
		$canvas->close_object();
		$canvas->add_object($footer, "all");

		$ruta = './pdf_disciplina/PDF_BOLETA_DE_DISCIPLINA_' . $slug . '.pdf';

		$output = $dompdf->output();
		if (file_put_contents($ruta, $output) != 0) {
			return $ruta;
		} else {
			return '';
		}
	}
}