<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.listado_clientes', compact('clientes'));
    }

    public function create()
    {
        return view('/clientes/formulario_clientes');

    }

    public function store(Request $req)
    {
        $cliente = new Cliente();

        $cliente->nombre = $req->input('nombre');
        $cliente->apellido_paterno = $req->input('apellido_paterno');
        $cliente->apellido_materno = $req->input('apellido_materno');
        $cliente->correo = $req->input('correo');
        $cliente->telefono = $req->input('telefono');
        $cliente->foto = $req->input('foto');
        $cliente->contraseña = bcrypt($req->input('contraseña'));
        $cliente->estado = $req->input('estado');
        $cliente->usuario = $req->input('usuario');
        
        $cliente->save(); //insert into table clientes

         return redirect('/clientes/listado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
