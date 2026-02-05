<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.listado_clientes', compact('clientes'));
    }

    public function show($id) {
        $cliente = Cliente::find($id);
        return view('clientes/formulario_showC', compact('cliente'));
    }

    public function create()
    {
        return view('clientes/formulario_clientes');
    }

    public function store(Request $req)
    {
        $cliente = new Cliente();

        $cliente->nombre = $req->input('nombre');
        $cliente->apellido_paterno = $req->input('apellido_paterno');
        $cliente->apellido_materno = $req->input('apellido_materno');
        $cliente->correo = $req->input('correo');
        $cliente->telefono = $req->input('telefono');
        $cliente->usuario = $req->input('usuario');
        $cliente->contraseña = bcrypt($req->input('contraseña'));
        $cliente->estado = $req->input('estado');

        $cliente->save();
        return redirect('/clientes/listado');
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes/formulario_showC')->with('cliente', $cliente);
    }
    public function update(Request $req, $id)
    {
        $cliente = Cliente::find($id);

        $cliente->nombre = $req->input('nombre');
        $cliente->apellido_paterno = $req->input('apellido_paterno');
        $cliente->apellido_materno = $req->input('apellido_materno');
        $cliente->correo = $req->input('correo');
        $cliente->telefono = $req->input('telefono');
        $cliente->usuario = $req->input('usuario');
        $cliente->estado = $req->input('estado');

        $cliente->save();
        return redirect('/clientes/listado');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
    
        $cliente->delete();
        return redirect('/clientes/listado')->with('mensaje', 'Cliente eliminado correctamente');
    }
}