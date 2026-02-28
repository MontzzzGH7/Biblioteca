<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
public function authorize(): bool
{
    return true; 
}

public function rules(): array
{
    return [
        
        'ejemplar_id'   => 'required|integer',
        'empleado_id'   => 'required|integer',
        'cliente_id'    => 'required|integer',
        'fecha_salida'  => 'required|date',
        'fecha_devol'   => 'required|date',
        'estado'        => 'required|string|max:255',
        'costo'         => 'required|numeric',

    ];
}
}
