<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('libros.listado_libros', compact('productos'));
    }

    public function create()
    {
        return view('libros.formulario_libros');
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

        // Lógica para la imagen de portada (igual que Administradores)
        if ($req->hasFile('imagen_url')) {
            $nombreImagen = time() . '.' . $req->imagen_url->extension();
            $req->imagen_url->move(public_path('img/libros'), $nombreImagen);
            $libro->imagen_url = $nombreImagen;
        }

        $libro->save();

        return redirect('/productos/listado');
    }

    public function edit($id)
    {
        $libro = Producto::find($id);
        // Pasamos la variable como 'libro' o 'producto' según uses en tu Blade
        return view('libros\formulario_editarL')->with('producto', $libro);
    }

    public function update(Request $req, $id)
    {
        $libro = Producto::find($id);
        
        $libro->titulo = $req->input('titulo');
        $libro->autor_id = $req->input('autor_id');
        $libro->descripcion = $req->input('descripcion');
        $libro->isbn = $req->input('isbn');
        $libro->edicion = $req->input('edicion');
        $libro->fecha_publi = $req->input('fecha_publi');
        $libro->estado = $req->input('estado');

        $libro->save();

        return redirect('/productos/listado');
    }

    public function destroy($id)
    {
        $libro = Producto::find($id);
        $libro->delete();
        return redirect('/productos/listado');
    }
}