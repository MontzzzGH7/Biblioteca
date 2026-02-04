<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('libros.listado_libros', compact('productos'));
    }

    public function create()
    {
        return view('/libros/formulario_libros');
    }

    public function store(Request $req)

    {
        $libro = new Producto();

        $libro->titulo = $req->input('titulo');
        $libro->autor_id = $req->input('autor_id');
        $libro->descripcion = $req->input('descripcion');
        $libro->isbn = $req->input('isbn');
        $libro->edicion = $req->input('edicion');
        $libro->fecha_publi = $req->input('fecha_publi');
        $libro->estado = $req->input('estado');

        $libro->save(); //insert into table productos

        return redirect('/productos/listado');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
