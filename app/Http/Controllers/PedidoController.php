<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\StorePedidoRequest; 
use Exception;

class PedidoController extends Controller
{
    public function index(Request $req) {

    if ($req->query('cliente_id')) {
        $id = $req->query('cliente_id');
        
        $pedidos = Pedido::with('multa')->where('cliente_id', $id)->get(); 

        return response()->json([
            "msj" => "Historial del cliente: " . $id,
            "total_pedidos" => $pedidos->count(),
            "data" => $pedidos
        ], 200);
    }

    return response()->json(Pedido::with('multa')->get(), 200);
}

    public function store(StorePedidoRequest $req) {
        try {
            $prestamo = new Pedido();
            
            $prestamo->ejemplar_id       = $req->ejemplar_id;
            $prestamo->empleado_id       = $req->empleado_id;
            $prestamo->cliente_id        = $req->cliente_id;
            $prestamo->fecha_salida      = $req->fecha_salida;
            $prestamo->fecha_devol       = $req->fecha_devol;
            $prestamo->estado            = $req->estado;
            $prestamo->costo             = $req->costo;

            $prestamo->save();

            return response()->json(['msj' => 'Prestamo registrado con éxito', 'data' => $prestamo], 201);

        } catch (Exception $e) {
            return response()->json(['msj' => 'Error fatal al guardar', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $req, $id) {
        try {
            $prestamo = Pedido::find($id);
            if (!$prestamo) return response()->json(['msj' => 'Prestamo no encontrado'], 404);

            $prestamo->ejemplar_id       = $req->ejemplar_id ?? $prestamo->ejemplar_id;
            $prestamo->empleado_id       = $req->empleado_id ?? $prestamo->empleado_id;
            $prestamo->cliente_id        = $req->cliente_id ?? $prestamo->cliente_id;
            $prestamo->fecha_salida      = $req->fecha_salida ?? $prestamo->fecha_salida;
            $prestamo->fecha_devol       = $req->fecha_devol ?? $prestamo->fecha_devol;
            $prestamo->estado            = $req->estado ?? $prestamo->estado;
            $prestamo->costo             = $req->costo ?? $prestamo->costo;

            $prestamo->save();
            return response()->json(['msj' => 'Prestamo actualizado correctamente', 'data' => $prestamo], 200);

        } catch (Exception $e) {
            return response()->json(['msj' => 'Error al actualizar', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id) {
        try {
            
            $prestamo = Pedido::find($id);
            if (!$prestamo) return response()->json(['msj' => 'Prestamo no encontrado'], 404);
            $prestamo->delete();
            return response()->json(['msj' => 'Prestamo eliminado'], 200);
        } catch (Exception $e) {
            return response()->json(['msj' => 'Error al eliminar', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id) {
    $prestamo = Pedido::with('multa')->find($id);

    if (!$prestamo) return response()->json(['msj' => 'No encontrado'], 404);
    
    return response()->json($prestamo, 200);
}
}