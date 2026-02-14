<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::all();
        return view('libros.listado_libros', compact('productos'));
    }

    public function create() {
        return view('libros.formulario_libros');
    }

    public function store(Request $req) {
        $libro = new Producto();
        $libro->titulo = $req->titulo;
        $libro->autor_id = $req->autor_id;
        $libro->descripcion = $req->descripcion;
        $libro->isbn = $req->isbn;
        $libro->edicion = $req->edicion;
        $libro->fecha_publi = $req->fecha_publi;
        $libro->estado = $req->estado;
        $libro->formato_id = $req->formato_id;
        $libro->idioma_id = $req->idioma_id;
        $libro->genero_id = $req->genero_id;
        $libro->editorial_id = $req->editorial_id;
        $libro->save(); 

        // Imágenes
        if ($req->hasFile('portada')) {
            $nom = 'productos_portada_' . $libro->id . '.' . $req->portada->extension();
            $req->portada->storeAs('img/libros', $nom, 'public');
            $libro->portada = $nom;
        }
        if ($req->hasFile('contraportada')) {
            $nom = 'productos_contra_' . $libro->id . '.' . $req->contraportada->extension();
            $req->contraportada->storeAs('img/libros', $nom, 'public');
            $libro->contraportada = $nom;
        }
        if ($req->hasFile('extra')) {
            $nom = 'productos_extra_' . $libro->id . '.' . $req->extra->extension();
            $req->extra->storeAs('img/libros', $nom, 'public');
            $libro->extra = $nom;
        }

        $libro->save();
        return redirect('/productos/listado');
    }

    public function show($id) {
        $producto = Producto::find($id);
        return view('libros.formulario_showL', compact('producto'));
    }

    public function edit($id) {
        $producto = Producto::find($id);
        return view('libros.formulario_editarL', compact('producto'));
    }

    public function update(Request $req, $id) {
        $libro = Producto::find($id);
    
        $libro->titulo = $req->titulo;
        $libro->autor_id = $req->autor_id;
        $libro->descripcion = $req->descripcion;
        $libro->isbn = $req->isbn;
        $libro->edicion = $req->edicion;
        $libro->fecha_publi = $req->fecha_publi;
        $libro->estado = $req->estado;
        $libro->formato_id = $req->formato_id;
        $libro->idioma_id = $req->idioma_id;
        $libro->genero_id = $req->genero_id;
        $libro->editorial_id = $req->editorial_id;

        // Lógica de imágenes
        if ($req->hasFile('portada')) {
            $nom = 'productos_portada_' . $libro->id . '.' . $req->portada->extension();
            $req->portada->storeAs('img/libros', $nom, 'public');
            $libro->portada = $nom;
        }
        if ($req->hasFile('contraportada')) {
            $nom = 'productos_contra_' . $libro->id . '.' . $req->contraportada->extension();
            $req->contraportada->storeAs('img/libros', $nom, 'public');
            $libro->contraportada = $nom;
        }
        if ($req->hasFile('extra')) {
            $nom = 'productos_extra_' . $libro->id . '.' . $req->extra->extension();
            $req->extra->storeAs('img/libros', $nom, 'public');
            $libro->extra = $nom;
        }

        $libro->save();
        return redirect('/productos/listado');
    }


    public function destroy($id) {
        $libro = Producto::find($id);
        if($libro) { $libro->delete(); }
        return redirect('/productos/listado');
    }

    public function inactivar($id) {
        $libro = Producto::find($id);
        if($libro) {
            $libro->estado = '3';
            $libro->save();
        }
        return redirect('/productos/listado');
    }

    public function activar($id) {
        $libro = Producto::find($id);
        if($libro) {
            $libro->estado = '1';
            $libro->save();
        }
        return redirect('/productos/listado');
    }
}