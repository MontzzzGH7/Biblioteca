<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
        'nombre'   => 'required|string',
        'correo'   => 'required|email|unique:clientes,correo',
        'telefono' => 'required|numeric',
        'usuario'  => 'required|unique:clientes,usuario',
        'estado'   => 'required|in:activo,inactivo',
        'foto'     => 'nullable|image|max:2048',
    ];
}
}
