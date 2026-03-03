<?php

namespace App\Http\Controllers;

use App\Models\Multa;
use App\Http\Requests\StoreMultaRequest;
use Exception;

class MultaController extends Controller
{
public function index() {

        $multas = Multa::with('pedido')->get();
        return response()->json($multas, 200);
    }    

public function store(StoreMultaRequest $req) {
        try {
            $multa = Multa::create($req->all());
            return response()->json([
                'msj' => 'Multa registrada exitosamente',
                'data' => $multa
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

public function show($id) {
        $multa = Multa::with('pedido')->find($id);
        if ($multa) {
            return response()->json($multa, 200);
        } else {
            return response()->json(['error' => 'Multa no encontrada'], 404);
        }
    }

public function update(Request $req, $id) {
        try {
            $multa = Multa::find($id);
            if ($multa) {
                $multa->update($req->all());
                return response()->json([
                    'msj' => 'Multa actualizada exitosamente',
                    'data' => $multa
                ], 200);
            } else {
                return response()->json(['error' => 'Multa no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

public function destroy($id) {
        try {
            $multa = Multa::find($id);
            if ($multa) {
                $multa->delete();
                return response()->json(['msj' => 'Multa eliminada exitosamente'], 200);
            } else {
                return response()->json(['error' => 'Multa no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
