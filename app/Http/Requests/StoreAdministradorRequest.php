<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdministradorRequest extends FormRequest
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
        'nombre'           => 'required|string|max:100',
        'apellido_paterno' => 'required|string|max:100',
        'correo'           => 'required|email|unique:administradores,correo',
        'usuario'          => 'required|unique:administradores,usuario',
        'contraseña'       => 'required|min:6',
        'rol'              => 'required|string',
        'foto'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ];
}
}
