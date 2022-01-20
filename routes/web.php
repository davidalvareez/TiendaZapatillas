<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZapatillaController;

/*Mostramos todas las zapatillas*/
Route::get('/mostrar',[ZapatillaController::class, 'mostrarZapatilla']);

