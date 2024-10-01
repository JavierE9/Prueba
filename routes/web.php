<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GraficoLinealController;
use App\Http\Controllers\GraficoCircularController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [SesionController::class, 'create'])
            ->middleware('guest')
            ->name('login.index');

Route::post('/login', [SesionController::class, 'store'])
            ->name('login.store');

Route::get('/logout', [SesionController::class, 'destroy'])
            ->middleware('auth')
            ->name('login.destroy');

Route::post('/registrar', [RegistrarController::class, 'store'])
            ->name('registrar.store');

Route::get('/registrar', [RegistrarController::class, 'create'])
            ->middleware('guest')
            ->name('registrar.index');
       
Route::get('/documentos', [DocumentController::class, 'index'])
            ->name('documentos');

Route::get('/documentos/crear', [DocumentController::class, 'create'])
            ->name('documentos.create');

Route::post('/documentos', [DocumentController::class, 'store'])
            ->name('documentos.store');

Route::get('/documentos/{id}/editar', [DocumentController::class, 'edit'])
            ->name('documentos.edit');

Route::put('/documentos/{id}', [DocumentController::class, 'update'])
            ->name('documentos.update');

Route::delete('/documentos/{id}', [DocumentController::class, 'destroy'])
            ->name('documentos.destroy');

Route::get('/grafico-lineal', [GraficoLinealController::class, 'index'])
            ->name('grafico.lineal');

Route::get('/grafico-circular', [GraficoCircularController::class, 'index'])
            ->name('grafico.circular');
Route::get('/documentos/{id}/edit', [DocumentController::class, 'edit'])
            ->name('documentos.edit');
            
Route::put('/documentos/{id}', [DocumentController::class, 'update'])
            ->name('documentos.update');