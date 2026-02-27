<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    public function index() {
        return response()->json(Cliente::all(), 200);
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
        
        $cliente->save();

        if($req->hasFile('foto')) {
            $foto = $req->file('foto');
            $nombre = 'clientes_' . $cliente->id . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('img/clientes', $nombre, 'public');
            $cliente->foto = $nombre;
            $cliente->save();
        }
        
        return response()->json(['msj' => 'Cliente creado con éxito', 'data' => $cliente], 201);
    }

    public function show($id) {
        $cliente = Cliente::find($id);
        if (!$cliente) return response()->json(['msj' => 'No encontrado'], 404);
        return response()->json($cliente, 200);
    }

    public function update(Request $req, $id) {
        $cliente = Cliente::find($id);
        if (!$cliente) return response()->json(['msj' => 'No encontrado'], 404);

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
        return response()->json(['msj' => 'Datos del cliente actualizados', 'data' => $cliente], 200);
    }

    public function destroy($id) {
        $cliente = Cliente::find($id);
        if (!$cliente) return response()->json(['msj' => 'No existe'], 404);
        $cliente->delete();
        return response()->json(['msj' => 'Cliente eliminado del sistema'], 200);
    }
}