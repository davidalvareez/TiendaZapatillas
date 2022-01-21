<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZapatillaController;

/*Mostramos todas las zapatillas*/
Route::get('/',[ZapatillaController::class, 'mostrarZapatilla']);

/*CREAR Zapatilla*/
//Route::get('/crearzapatilla',[ZapatillaController::class, 'crearZapatillaGet']);
Route::post('/crearzapatilla',[ZapatillaController::class, 'crearZapatillaPost']);

/*ACTUALIZAR Zapatilla*/
//Route::get('/modificarZapatilla/{id}', [ZapatillaController::class, 'modificarZapatilla']);
Route::put('/modificarZapatilla',[ZapatillaController::class, 'modificarZapatillaPut']);

/*ELIMINAR ZAPATILLA*/
Route::delete('/eliminarZapatilla/{id}', [ZapatillaController::class, 'eliminarZapatilla']);