<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AlumnosController;
use App\Http\Controllers\Admin\ApoderadosController;
use App\Http\Controllers\Admin\AsistenciaController;
use App\Http\Controllers\Admin\GradoController;
use App\Http\Controllers\Admin\JustificacionController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\ProfesorController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ReportesController;
use App\Http\Controllers\Admin\SeccionController;
use App\Http\Controllers\Admin\HorariosController;
use App\Http\Controllers\Admin\MotivoController;
use App\Http\Controllers\Admin\WhatsappController;
use GuzzleHttp\Middleware;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
//Alumnos
Route::resource('alumnos', AlumnosController::class)->names('admin.alumnos');
Route::post('alumnos/{alumno}/generarPDF', [AlumnosController::class, 'generatePDF'])->name('admin.alumnos.generatePDF');
Route::get('alumnos/pdf/allAlumno', [AlumnosController::class, 'generatePDF_allAlumnos'])->name('admin.alumnos.pdf.allAlumno');
Route::get('alumnos/pdf/alumnosGrado', [AlumnosController::class, 'carneGrados'])->name('admin.alumnos.pdf.alumnosGrado');

//Mensajeria Whatsapp
Route::resource('whatsapp', WhatsappController::class)->names('admin.whatsapp');
Route::get('/Wapp', [WhatsappController::class, 'enviarWsp'])->name('mensajeria');
//generar pdf de carne
Route::post('alumnos/{alumno}/generar-carne', [AlumnosController::class, 'carnet'])->name('admin.alumnos.generar-carne');

//perfiles
Route::get('perfil', [PerfilController::class, 'index'])->name('admin.perfil.index');

//Horarios
Route::resource('horarios', HorariosController::class)->names('admin.horarios');
//Parientes
Route::resource('apoderados', ApoderadosController::class)->names('admin.apoderados');

//usuarios y roles
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('roles', RoleController::class)->names('admin.roles');

//Reportes
Route::resource('reportes', ReportesController::class)->names('admin.reportes');
Route::get('asistencia/reportes', [ReportesController::class, 'index_asistencias'])->name('admin.reportes.index_asistencia');
Route::post('asistencia/consulta/reportes', [ReportesController::class, 'consultar_asistencias'])->name('admin.reportes.consultar_asistencia');
Route::get('justificacion/reportes', [ReportesController::class, 'index_justificaciones'])->name('admin.reportes.index_justificacion');
Route::post('justificacion/consulta/reportes', [ReportesController::class, 'consultar_justificacion'])->name('admin.reportes.consultar_justificacion');

//reportes alumnos
Route::get('alumno/reportes', [ReportesController::class, 'index_reportes_alumnos'])->name('admin.reportes.index_reportes_alumnos');
//Reportes en pdf
Route::get('generar-pdf-asistencias/reportes', [ReportesController::class, 'generarPDFAsistencias'])->name('admin.reportes.asistencia_pdf');
Route::get('generar-pdf-justificaciones/reportes', [ReportesController::class, 'generarPDFJustificaciones'])->name('admin.reportes.pdf_justificacion');

//Reportes en Excel de asistencia y justificacion
Route::get('exportar-datos-asistencia/reportes', [ReportesController::class, 'generarExcelAsistencias'])->name('admin.reportes.index_asistencia_excel');
Route::get('exportar-datos-justificacion/reportes', [ReportesController::class, 'generarExcelJustificacion'])->name('admin.reportes.index_justificacion_excel');
//Profesores
Route::resource('profesores', ProfesorController::class)->names('admin.profesores');

//asistencias
Route::resource('asistencia', AsistenciaController::class)->names('admin.asistencia');
Route::get('/control', [AsistenciaController::class, 'controlList'])->name('admin.asistencia.control');
Route::get('faltas', [AsistenciaController::class, 'asistenciaFaltasM'])->name('admin.asistencia.faltaTurnoM');
//Importar de Excel

//ALUMNOS

Route::post('/import-alumno', [AlumnosController::class, 'import'])->name('import');
Route::get('cargas/alumnos', [AlumnosController::class, 'index_cargas'])->name('admin.alumnos.index_cargas');

//APODERADOS
Route::post('/import-apoderado', [ApoderadosController::class, 'import'])->name('import-apoderado');
Route::get('cargas/apoderados', [ApoderadosController::class, 'index_cargas'])->name('admin.apoderados.index_cargas_apoderado');

//Exportar Excel

//ALUMNOS
Route::get('//export', [AlumnosController::class, 'export'])->name('export');


//Justificaciones
Route::resource('justificacion', JustificacionController::class)->names('admin.justificacion');

//removidos restaurar eliminar

//ALUMNOS
Route::get('removidos/alumnos', [AlumnosController::class, 'indextrash'])->name('admin.alumnos.indextrash');
Route::put('alumnos/{alumno}/destroylogico', [AlumnosController::class, 'destroyLogico'])->name('admin.alumnos.destroyLogico');
Route::put('alumnos/{alumno}/restaurarAlumno', [AlumnosController::class, 'restaurarAlumnos'])->name('admin.alumnos.restaurarAlumnos');

//APODERADOS
Route::get('removidos/apoderados', [ApoderadosController::class, 'indextrash'])->name('admin.apoderados.indextrash');
Route::put('apoderados/{apoderado}/destroylogico', [ApoderadosController::class, 'destroyLogico'])->name('admin.apoderados.destroyLogico');
Route::put('apoderados/{apoderado}/restaurarApoderado', [ApoderadosController::class, 'restaurarApoderados'])->name('admin.apoderados.restaurarApoderados');

//GRADOS
Route::get('removidos/grado', [GradoController::class, 'indextrash'])->name('admin.grado.indextrash');
Route::put('grado/{grado}/destroylogico', [GradoController::class, 'destroyLogico'])->name('admin.grado.destroyLogico');
Route::put('grado/{grado}/restaurarGrado', [GradoController::class, 'restaurarGrado'])->name('admin.grado.restaurargrado');

//SECCIONES
Route::get('removidos/seccion', [SeccionController::class, 'indextrash'])->name('admin.seccion.indextrash');
Route::put('seccion/{seccion}/destroylogico', [SeccionController::class, 'destroyLogico'])->name('admin.seccion.destroyLogico');
Route::put('seccion/{seccion}/restaurarSeccion', [SeccionController::class, 'restaurarSeccion'])->name('admin.seccion.restaurarseccion');

//MOTIVO

Route::get('removidos/motivo', [MotivoController::class, 'indextrash'])->name('admin.motivo.indextrash');
Route::put('motivo/{motivo}/destroylogico', [MotivoController::class, 'destroyLogico'])->name('admin.motivo.destroyLogico');
Route::put('motivo/{motivo}/restaurarMotivo', [MotivoController::class, 'restaurarMotivo'])->name('admin.motivo.restaurarmotivo');

//Grados
Route::resource('grado', GradoController::class)->names('admin.grado');

//Motivos
Route::resource('motivo', MotivoController::class)->names('admin.motivo');

//Secciones
Route::resource('seccion', SeccionController::class)->names('admin.seccion');

//Ruta AJAX
Route::get('/buscar-alumno', [JustificacionController::class, 'search'])->name('buscar.alumno');
