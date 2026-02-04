<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*INTEGRANTES 
Alonso Caballero Ximena Montserrat
Ferrer López Angel Uriel 

*/
Route::get('/', function () {
    return view('welcome');
});
Route::view('flow','/flow/flow');
Route::view('Inicio','/layouts/app');
//admins
//Route::view('/Admins/registro','/Administradores/formulario_crear');
//Route::view('/Admins/listado','/Administradores/listado');

//clientes
//Route::view('/Clientes/registro','/Clientes/formulario_clientes');
//Route::view('/Clientes/listado','/Clientes/listado_clientes');
//libros
//Route::view('/Libros/registro','/Libros/formulario_libros');
//Route::view('/Libros/listado','/Libros/listado_libros');

Route::get('/admins/listado',[AdministradorController::class, 'index']);
Route::get('/productos/listado',[ProductoController::class, 'index']);
Route::get('/clientes/listado',[ClienteController::class, 'index']);

Route::get('/admins/registro',[AdministradorController::class, 'create']);
Route::get('/clientes/registro',[ClienteController::class, 'create']);
Route::get('/productos/registro',[ProductoController::class, 'create']);

Route::post('/admins/registro',[AdministradorController::class, 'store']);
Route::post('/clientes/registro',[ClienteController::class, 'store']);
Route::post('/productos/registro',[ProductoController::class, 'store']);

Route::post('/admins/{id}/editar',[AdministradorController::class, 'update']);
Route::get('/admins/{id}/editar',[AdministradorController::class, 'edit']);