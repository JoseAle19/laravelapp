<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seguridad\LoginController;
use App\Http\Controllers\Seguridad\UsuarioController;

Route::get('/', function () {
    return redirect('/seguridad/auth/login');
});

/**SEGURIDAD */
Route::prefix('seguridad')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');

        Route::post('/acceso', [
            LoginController::class,
            'acceso'
        ])->name('login.acceso');


           Route::get('/forgot-password', [LoginController::class, 'showForgotForm'])
           ->name('password.request');

      Route::post('/forgot-password', [LoginController::class, 'sendResetCode'])
           ->name('password.email');

      Route::get('/verify-code', [LoginController::class, 'showVerifyForm'])
           ->name('password.verify.form');
      Route::post('/verify-code', [LoginController::class, 'verifyCode'])
           ->name('password.verify');

      Route::get('/reset-password', [LoginController::class, 'showResetForm'])
           ->name('password.reset.form');
      Route::post('/reset-password', [LoginController::class, 'resetPassword'])
           ->name('password.update');
    });
    
    /**USUARIO */
    Route::prefix('usuario')->group(function () {
        Route::get('/catalogo', [
            UsuarioController::class,
            'catalogo'
        ])->name('usuarios.catalogo');


        Route::get('/detalle/{idUsuario}', [
            UsuarioController::class,
            'detalle'
        ])->name('usuarios.detalle');


            // 5. Mostrar formulario para adjuntar imagen
            Route::get('/{idUsuario}/imagen', [UsuarioController::class, 'formImagen'])
            ->name('usuarios.formImagen');

       // 8. Procesar carga de la imagen
       Route::post('/{idUsuario}/imagen', [UsuarioController::class, 'subirImagen'])
            ->name('usuarios.subirImagen');
    });
});
