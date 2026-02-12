<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::all();
        return view('clientes.listado_clientes', compact('clientes'));
    }

    public function create() {
        return view('clientes.formulario_clientes');
    }

    public function store(Request $req) {
        $cliente = new Cliente();
        $cliente->nombre = $req->nombre;
        $cliente->apellido_paterno = $req->apellido_paterno;
        $cliente->apellido_materno = $req->apellido_materno;
        $cliente->correo = $req->correo;
        $cliente->telefono = $req->telefono;
        $cliente->usuario = $req->usuario;
        $cliente->contraseña = bcrypt($req->contraseña);
        $cliente->estado = $req->estado;
        $cliente->foto = 'cliente_default.jpg';
        $cliente->save(); // Guardar para generar ID

        if($req->hasFile('foto')) {
            $foto = $req->file('foto');
            $nombre = 'clientes_' . $cliente->id . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('img/clientes', $nombre, 'public');
            
            $cliente->foto = $nombre;
            $cliente->save();
        }
        return redirect('/clientes/listado');
    }

    public function edit($id) {
        $cliente = Cliente::find($id);
        return view('clientes.formulario_showC', compact('cliente'));
    }

    public function update(Request $req, $id) {
        $cliente = Cliente::find($id);
        $cliente->nombre = $req->nombre;
        $cliente->apellido_paterno = $req->apellido_paterno;
        $cliente->correo = $req->correo;
        $cliente->estado = $req->estado;

        if($req->hasFile('foto')) {
            $foto = $req->file('foto');
            $nombre = 'clientes_' . $cliente->id . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('img/clientes', $nombre, 'public');
            $cliente->foto = $nombre;
        }
        $cliente->save();
        return redirect('/clientes/listado');
    }

}