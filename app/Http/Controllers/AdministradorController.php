<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdministradorController extends Controller
{
    public function index() {
        $administradores = Administrador::all();
        return view('administradores.listado', compact('administradores'));
    }

    public function create() {
        return view('administradores.formulario_crear');
    }

    public function store(Request $req) {
        $admin = new Administrador();
        $admin->nombre = $req->nombre;
        $admin->apellido_paterno = $req->apellido_paterno;
        $admin->apellido_materno = $req->apellido_materno;
        $admin->correo = $req->correo;
        $admin->usuario = $req->usuario;
        $admin->contraseña = bcrypt($req->contraseña);
        $admin->rol = $req->rol;
        $admin->estado = 'activo';
        $admin->foto = 'default.jpg'; 

        $admin->save(); // Guardar para tener ID

        if($req->hasFile('foto')) {
            $foto = $req->file('foto');
            
            $nombre = 'administradores_' . $admin->id . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('img/admins', $nombre, 'public');
            
            $admin->foto = $nombre;
            $admin->save();
        }
        return redirect('/admins/listado');
    }

    public function edit($id) {
        $administrador = Administrador::find($id);
        return view('administradores.formulario_editar', compact('administrador'));
    }

    public function update(Request $req, $id) {
        $admin = Administrador::find($id);
        $admin->nombre = $req->nombre;
        $admin->apellido_paterno = $req->apellido_paterno;
        $admin->rol = $req->rol;

        if($req->hasFile('foto')) {
            $foto = $req->file('foto');
            $nombre = 'administradores_' . $admin->id . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('img/admins', $nombre, 'public');
            $admin->foto = $nombre;
        }
        $admin->save();
        return redirect('/admins/listado');
    }


}