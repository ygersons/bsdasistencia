<?php

use App\Http\Controllers\Admin\AsistenciaController;
use App\Http\Controllers\Admin\SendMailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/admin');
});

//Auth::routes(); //estas rutas son las que se deben comentar para poder usar el jetstream

Route::get('/gEntrada', [AsistenciaController::class,'marcar']);
Route::get('/control', [AsistenciaController::class,'controlList']);

//ruta para mandar emails
Route::get('send-mailer-create/{email}',[SendMailController::class, 'create'])->name('send.mailer.create');

Route::get('/register', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/admin');
    })->name('dashboard');
});

