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

    public function show($id) {
        $admin = Administrador::find($id);
        return view('administradores.formulario_show', compact('admin'));
    }

    public function edit($id) {
        $administrador = Administrador::find($id);
        return view('administradores.formulario_editar', compact('administrador'));
    }

    public function update(Request $req, $id) {
    $admin = Administrador::find($id);

    $admin->nombre = $req->nombre;
    $admin->apellido_paterno = $req->apellido_paterno;
    $admin->apellido_materno = $req->apellido_materno; 
    $admin->rol = $req->rol;
    $admin->estado = $req->estado;  

    // 2. Manejo de la foto
    if($req->hasFile('foto')) {

        if ($admin->foto != 'default.jpg' && Storage::disk('public')->exists('img/admins/' . $admin->foto)) {
            Storage::disk('public')->delete('img/admins/' . $admin->foto);
        }

        $foto = $req->file('foto');
        $nombre = 'administradores_' . $admin->id . '_' . time() . '.' . $foto->getClientOriginalExtension();
        $foto->storeAs('img/admins', $nombre, 'public');
        $admin->foto = $nombre;
    }

    $admin->save();

    return redirect('/admins/listado')->with('mensaje', 'Administrador actualizado correctamente');
}

    public function destroy($id) {
        $admin = Administrador::find($id);
        
        if ($admin) {
            if ($admin->foto != 'default.jpg') {
                Storage::disk('public')->delete('img/admins/' . $admin->foto);
            }
            $admin->delete();
        }
        
        return redirect('/admins/listado')->with('mensaje', 'Administrador eliminado permanentemente.');
    }

    public function inactivar($id) {
        $admin = Administrador::find($id);
        if($admin) {
            $admin->estado = 'inactivo';
            $admin->save();
        }
        return redirect('/admins/listado');
    }

    public function activar($id) {
        $admin = Administrador::find($id);
        if($admin) {
            $admin->estado = 'activo';
            $admin->save();
        } 
        
        return redirect('/admins/listado');
    }


}