<?php

namespace App\Http\Controllers;

use App\Models\Multa;
use App\Http\Requests\StoreMultaRequest;
use Exception;

class MultaController extends Controller
{
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
}
