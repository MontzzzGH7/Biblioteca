<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;

class LoginController extends Controller
{
    public function login(Request $request) {
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
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}