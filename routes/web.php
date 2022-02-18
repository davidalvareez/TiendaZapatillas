<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZapatillaController;
/*LOGIN*/
Route::get('/login',[ZapatillaController::class, 'login']);
Route::post('loginPost',[ZapatillaController::class,'loginPost']);
/*LOGOUT*/
Route::get("logout",[ZapatillaController::class,'logout']);
/*Mostramos todas las zapatillas*/
Route::get('/',[ZapatillaController::class, 'mostrarZapatilla']);

/*CREAR Zapatilla*/
Route::get('/crearzapatilla',[ZapatillaController::class, 'crearZapatillaGet']);
Route::post('/crearzapatilla',[ZapatillaController::class, 'crearZapatillaPost']);

/*ACTUALIZAR Zapatilla*/
Route::get('/modificarZapatilla/{id}', [ZapatillaController::class, 'modificarZapatilla']);
Route::put('/modificarZapatilla',[ZapatillaController::class, 'modificarZapatillaPut']);

/*ELIMINAR ZAPATILLA*/
Route::get('/eliminarZapatilla/{id}', [ZapatillaController::class, 'eliminarZapatilla']);


/*Agregar elemento al carrito*/
Route::get('addCart/{id}',[ZapatillaController::class, 'addShoppingCart']);

/*PROVISIONAL FACTURA */
Route::get('/factura',[ZapatillaController::class, 'factura']);

/*Pago + email*/
 Route::get('/pagar',[ZapatillaController::class, 'pagar']);