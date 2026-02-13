<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;
use Illuminate\Http\Request; 

/*
INTEGRANTES:
Alonso Caballero Ximena Montserrat
Ferrer López Angel Uriel 
*/

// RUTAS PÚBLICAS
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){ 
    return view('login.login'); 
})->name('login');

// LOGIN DIRECTO (Sin usar el controlador que falla)
Route::post('/login', function (Request $request) {
    $request->validate([
        'usuario' => 'required',
        'contraseña' => 'required'
    ]);

    $credenciales = [
        'usuario'  => $request->usuario,
        'password' => $request->contraseña,
        'estado'   => 'activo'
    ]; 

    if (Auth::guard('admin')->attempt($credenciales)) {
        $request->session()->regenerate();
        return redirect()->intended('/Inicio');
    }

    return back()->withErrors([
        'error' => 'Usuario/Contraseña incorrectos o cuenta inactiva.'
    ])->withInput();
});

// --- RUTA DE SALIDA A GOOGLE ---
Route::get('/auth/google', function(){
    return Socialite::driver('google')
        ->with(['prompt' => 'select_account']) 
        ->redirect();
})->name('google.login');


// RUTAS PROTEGIDAS (Solo Admins Registrados y Activos)
Route::middleware(['auth:admin'])->group(function () {

    Route::get('/Inicio', function () {
        return view('layouts.app');
    })->name('dashboard');

    // CRUD Admins
    Route::get('/admins/listado',[AdministradorController::class, 'index']);
    Route::get('/admins/registro',[AdministradorController::class, 'create']);
    Route::post('/admins/registro',[AdministradorController::class, 'store']);
    Route::get('/admins/{id}/editar',[AdministradorController::class, 'edit']);
    Route::post('/admins/{id}/actualizar',[AdministradorController::class, 'update']);
    Route::post('/admins/{id}/eliminar',[AdministradorController::class, 'destroy']);
    Route::get('/admins/{id}/ver',[AdministradorController::class, 'show']);

    // CRUD Clientes
    Route::get('/clientes/listado',[ClienteController::class, 'index']);
    Route::get('/clientes/registro',[ClienteController::class, 'create']);
    Route::post('/clientes/registro',[ClienteController::class, 'store']);
    Route::get('/clientes/{id}/editar',[ClienteController::class, 'edit']);
    Route::post('/clientes/{id}/actualizar',[ClienteController::class, 'update']);
    Route::post('/clientes/{id}/eliminar',[ClienteController::class, 'destroy']);
    Route::get('/clientes/{id}/ver',[ClienteController::class, 'show']);

    // CRUD Productos
    Route::get('/productos/listado',[ProductoController::class, 'index']);
    Route::get('/productos/registro',[ProductoController::class, 'create']);
    Route::post('/productos/registro',[ProductoController::class, 'store']);
    Route::get('/productos/{id}/editar',[ProductoController::class, 'edit']);
    Route::post('/productos/{id}/actualizar',[ProductoController::class, 'update']);
    Route::post('/productos/{id}/eliminar',[ProductoController::class, 'destroy']);
    Route::get('/productos/{id}/ver',[ProductoController::class, 'show']);

    Route::post('/logout', function (Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

// CALLBACK DE GOOGLE
Route::get('/auth/google/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();
        $admin = Administrador::where('correo', $googleUser->getEmail())->first();

        if ($admin) {
            if ($admin->estado == 'activo') {
                Auth::guard('admin')->login($admin);
                return redirect()->intended('/Inicio');
            } else {
                Auth::guard('admin')->logout(); 
                return redirect('/login')->withErrors(['error' => 'Esta cuenta está desactivada.']);
            }
        }

        Auth::guard('admin')->logout(); 
        return redirect('/login')->withErrors(['error' => 'Acceso denegado. El correo ' . $googleUser->getEmail() . ' no es administrador.']);

    } catch (Exception $e) {
        return redirect('/login')->withErrors(['error' => 'Error al conectar con Google.']);
    }
});

Route::get('/geolocalizacion', function () {
    return view('geolocalizacion.geolocalizacion');
});