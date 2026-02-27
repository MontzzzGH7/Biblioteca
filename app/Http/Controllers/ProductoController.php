<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductoRequest; 
use Illuminate\Support\Facades\Storage;
use Exception;

class ProductoController extends Controller
{
    public function index() {
        return response()->json(Producto::all(), 200);
    }

    public function store(StoreProductoRequest $req) {
        try {
            $libro = new Producto();
            
            $libro->titulo        = $req->titulo;
            $libro->autor_id      = $req->autor_id;
            $libro->descripcion   = $req->descripcion;
            $libro->isbn          = $req->isbn;
            $libro->edicion       = $req->edicion;
            $libro->fecha_publi   = $req->fecha_publi;
            $libro->estado        = $req->estado;
            $libro->formato_id    = $req->formato_id;
            $libro->idioma_id     = $req->idioma_id;
            $libro->genero_id     = $req->genero_id;
            $libro->editorial_id  = $req->editorial_id;
            
            $libro->portada       = 'default.jpg';
            $libro->save(); 

            if ($req->hasFile('portada')) {
                $file = $req->file('portada');
                $nom = 'prod_portada_' . $libro->id . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('img/libros', $nom, 'public');
                $libro->portada = $nom;
                $libro->save(); 
            }

            return response()->json(['msj' => 'Libro registrado con éxito', 'data' => $libro], 201);

        } catch (Exception $e) {
            return response()->json(['msj' => 'Error fatal al guardar', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $req, $id) {
        try {
            $libro = Producto::find($id);
            if (!$libro) return response()->json(['msj' => 'Libro no encontrado'], 404);

            $libro->titulo        = $req->titulo ?? $libro->titulo;
            $libro->autor_id      = $req->autor_id ?? $libro->autor_id;
            $libro->descripcion   = $req->descripcion ?? $libro->descripcion;
            $libro->isbn          = $req->isbn ?? $libro->isbn;
            $libro->estado        = $req->estado ?? $libro->estado;
            $libro->editorial_id  = $req->editorial_id ?? $libro->editorial_id;
            
            if ($req->hasFile('portada')) {
                $file = $req->file('portada');
                $nom = 'prod_portada_' . $libro->id . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('img/libros', $nom, 'public');
                $libro->portada = $nom;
            }

            $libro->save();
            return response()->json(['msj' => 'Libro actualizado correctamente', 'data' => $libro], 200);

        } catch (Exception $e) {
            return response()->json(['msj' => 'Error al actualizar', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id) {
        try {
            $libro = Producto::find($id);
            if (!$libro) return response()->json(['msj' => 'No existe'], 404);
            
            $libro->delete();
            return response()->json(['msj' => 'Libro eliminado'], 200);
        } catch (Exception $e) {
            return response()->json(['msj' => 'Error al eliminar', 'error' => $e->getMessage()], 500);
        }
    }
}