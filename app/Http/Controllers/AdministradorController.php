<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAdministradorRequest;
use Exception;

class AdministradorController extends Controller
{
    public function index() {
        return response()->json(Administrador::all(), 200);
    }

    public function store(StoreAdministradorRequest $req) {
        try {
            $admin = new Administrador();
            $admin->nombre = $req->nombre;
            $admin->apellido_paterno = $req->apellido_paterno;
            $admin->apellido_materno = $req->apellido_materno;
            $admin->correo = $req->correo;
            $admin->usuario = $req->usuario;
            
            $admin->contraseña = bcrypt($req->contraseña); 
            
            $admin->rol = $req->rol;
            $admin->estado = 'activo';
            $admin->foto = 'default.jpg'; 

            $admin->save(); 

            if($req->hasFile('foto')) {
                $foto = $req->file('foto');
                $nombre = 'administradores_' . $admin->id . '.' . $foto->getClientOriginalExtension();
                $foto->storeAs('img/admins', $nombre, 'public');
                $admin->foto = $nombre;
                $admin->save();
            }

            return response()->json([
                'mensaje' => 'Administrador creado con éxito',
                'data' => $admin
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo guardar la mercancía',
                'detalle' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id) {
        $admin = Administrador::find($id);
        if (!$admin) return response()->json(['mensaje' => 'No encontrado'], 404);
        return response()->json($admin, 200);
    }

    public function update(Request $req, $id) {
        $admin = Administrador::find($id);
        if (!$admin) return response()->json(['mensaje' => 'No encontrado'], 404);

        $admin->nombre = $req->nombre;
        $admin->apellido_paterno = $req->apellido_paterno;
        $admin->rol = $req->rol;

        if($req->hasFile('foto')) {
            $foto = $req->file('foto');
            $nombre = 'administradores_' . $admin->id . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('img/admins', $nombre, 'public');
            $admin->foto = $nombre;
        }
        
        $admin->save();
        return response()->json(['mensaje' => 'Actualizado', 'data' => $admin], 200);
    }

    public function destroy($id) {
        $admin = Administrador::find($id);
        if (!$admin) return response()->json(['mensaje' => 'No existe'], 404);
        $admin->delete();
        return response()->json(['mensaje' => 'Eliminado'], 200);
    }
}