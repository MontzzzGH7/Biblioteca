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

Route::get('/admins/{id}/editar',[AdministradorController::class, 'edit']);
route::get('/clientes/{id}/editar',[ClienteController::class, 'edit']);
route::get('/productos/{id}/editar',[ProductoController::class, 'edit']);

Route::post('/admins/{id}/actualizar',[AdministradorController::class, 'update']);
route::post('/clientes/{id}/actualizar',[ClienteController::class, 'update']);
route::post('/productos/{id}/actualizar',[ProductoController::class, 'update']);

Route::post('/admins/{id}/eliminar',[AdministradorController::class, 'destroy']);
route::post('/clientes/{id}/eliminar',[ClienteController::class, 'destroy']);
route::post('/productos/{id}/eliminar',[ProductoController::class, 'destroy']);

Route::get('/admins/{id}/ver',[AdministradorController::class, 'show']);
route::get('/clientes/{id}/ver',[ClienteController::class, 'show']);
route::get('/productos/{id}/ver',[ProductoController::class, 'show']);




Route::get('/geolocalizacion', function () {return view('geolocalizacion.geolocalizacion');});
Route::get('/login', function(){ return view('login.login');})->name('login');








// RUTA DE INICIO DE GOOGLE OAUTH
Route::get('/auth/google', function(){
    return Socialite::driver('google')->redirect();
})->name('google.login');

// RUTA DE CALLBACK DE GOOGLE
Route::get('/auth/google/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();

        // Buscar si el usuario ya existe
        $user = User::where('email', $googleUser->getEmail())->first();

        // Si no existe, crearlo automáticamente
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(uniqid()),
            ]);
        }

        // Iniciar sesión
        Auth::login($user);

        // Redirigir al home
        return redirect('/');

    } catch (Exception $e) {
        return redirect('/login')->with('error', 'Error: ' . $e->getMessage());
    }
});

// RUTA DE INICIO (HOME)
Route::get('/', function(){
    return "¡Login exitoso! Bienvenido a la biblioteca.";
});