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
        $libro->save(); // Guardar para obtener ID

        // Imagen 1: Portada
        if ($req->hasFile('portada')) {
            $nom = 'productos_portada_' . $libro->id . '.' . $req->portada->extension();
            $req->portada->storeAs('img/libros', $nom, 'public');
            $libro->portada = $nom;
        }
        // Imagen 2: Contraportada
        if ($req->hasFile('contraportada')) {
            $nom = 'productos_contra_' . $libro->id . '.' . $req->contraportada->extension();
            $req->contraportada->storeAs('img/libros', $nom, 'public');
            $libro->contraportada = $nom;
        }
        // Imagen 3: Extra (Obligatoria según instrucciones)
        if ($req->hasFile('extra')) {
            $nom = 'productos_extra_' . $libro->id . '.' . $req->extra->extension();
            $req->extra->storeAs('img/libros', $nom, 'public');
            $libro->extra = $nom;
        }

        $libro->save();
        return redirect('/productos/listado');
    }

    public function edit($id) {
        $producto = Producto::find($id);
        return view('libros.formulario_editarL', compact('producto'));
    }

    public function update(Request $req, $id) {
        $libro = Producto::find($id);
        $libro->titulo = $req->titulo;
        $libro->estado = $req->estado;

        // Repetir lógica de imágenes (sobrescribe por nombre)
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

}