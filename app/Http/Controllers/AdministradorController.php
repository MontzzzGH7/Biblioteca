<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{

    public function index()
    {
        $administradores = Administrador::all();
        return view('administradores.listado', compact('administradores'));
    }

    public function create()
    {
        return view('/administradores/formulario_crear');
    }

    public function store(Request $req)
    {
        //return $req->all();

        $admin = new Administrador();

        $admin->nombre = $req->input('nombre');
        $admin->apellido_paterno = $req->input('apellido_paterno');
        $admin->apellido_materno = $req->input('apellido_materno');
        $admin->correo = $req->input('correo');
        $admin->usuario = $req->input('usuario');
        $admin->contraseña = bcrypt($req->input('contraseña'));
        $admin->rol = $req->input('rol');
        $admin->foto = $req->input('foto');
        $admin->estado = $req->input('estado');

        $admin->save(); //insert into table administradores

        return redirect('/admins/listado');
    }

    public function show($id)
    {
        $administrador = Administrador::find($id);
        return view('administradores/formulario_show', compact('administrador'));
    }

    public function edit($id)
    {
        $admin = Administrador::find($id);
        return view('/administradores/formulario_editar')->with('administrador', $admin);
    }

    public function update(Request $req, $id)
    {
        //$admin = Administrador::find($id);
        $admin = Administrador::find($id);

        $admin->nombre = $req->input('nombre');
        $admin->apellido_paterno = $req->input('apellido_paterno');
        $admin->apellido_materno = $req->input('apellido_materno');
        $admin->correo = $req->input('correo');
        $admin->usuario = $req->input('usuario');
        $admin->contraseña = bcrypt($req->input('contraseña'));
        $admin->rol = $req->input('rol');
        $admin->foto = $req->input('foto');
        $admin->estado = $req->input('estado');

        $admin->save(); //update administradores set ... where id=id

        return redirect('/admins/listado');


    }

    public function destroy($id)
    {
        $administrador = Administrador::find($id);
    
        $administrador->delete();
        return redirect('/admins/listado')->with('mensaje', 'Administrador eliminado correctamente');
    }



}
