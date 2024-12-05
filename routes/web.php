<?php

use App\Http\Controllers\web\MensajesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\RegistroController;
use App\Http\Controllers\web\SesionController;
use App\Http\Controllers\web\RecuperarContrasena;
use App\Http\Controllers\web\HistoriasController;
use App\Http\Controllers\web\SolicitudAmistadController;

Route::get('/registro', function () { return view('registro'); 
})->name('registro.form');

Route::post('/registro', [RegistroController::class, 'register'])->name('registro');

Route::get('/registro', function () {
    return view('registro'); 
})->name('registro');

Route::get('/login', function () { return view('InicioSesion');
})->name('login');

Route::get('/', function () { return view('InicioSesion');
})->name('login');

Route::get('/olvidaste', function () { return view('olvidaste_password');
})->name('olvidaste');


//Route::get('/solicitudespendientes', [SolicitudAmistadController::class, 'mostrarSolicitudesPendientes'])->name('solicitudespendientes');


Route::post('/login', [SesionController::class, 'login'])->name('InicioSesion');

Route::get('/Inicio', [SesionController::class, 'inicio'])->name('Inicio');



Route::post('/recuperar', [RecuperarContrasena::class, 'recuperar'])->name('recuperar');
Route::get('/cuentaidentificadaenviar/{usuario}', [RecuperarContrasena::class, 'enviarCorreoRecuperacion'])->name('password.request');
Route::get('/password/restablecer', [RecuperarContrasena::class, 'showResetForm'])->name('password.reset');
Route::post('/password/actualizar', [RecuperarContrasena::class, 'resetPassword'])->name('password.update');

Route::view('/cuentaidentificada', 'cuenta_identificada')->name('cuenta.identificada');

Route::get('/amigos', [SolicitudAmistadController::class, 'mostrarAmigos'])->name('mostrar.amigos');

//Route::post('/publicar-historia', [SesionController::class, 'publicarHistoria'])->name('publicar.historia');

Route::post('/logout', [SesionController::class, 'logout'])->name('logout');

Route::get('/solicitudes', [SolicitudAmistadController::class, 'mostrarSolicitudes'])->name('mostrarSolicitudes');
Route::post('/solicitudes/enviar', [SolicitudAmistadController::class, 'enviarSolicitud'])->name('enviarSolicitud');
Route::post('/solicitudes/aceptar', [SolicitudAmistadController::class, 'aceptarSolicitud'])->name('aceptarSolicitud');
Route::post('/solicitudes/rechazar', [SolicitudAmistadController::class, 'rechazarSolicitud'])->name('rechazarSolicitud');

Route::post('/historias/publicar', [SesionController::class, 'publicarHistoria'])->name('publicarHistoria');
Route::post('/publicaciones/publicar', [SesionController::class, 'publicarPublicacion'])->name('publicarPublicacion');