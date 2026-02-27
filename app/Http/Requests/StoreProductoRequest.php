<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
        'titulo'        => 'required|string|max:255',
        'isbn'          => 'required|unique:libros,isbn', 
        'autor_id'      => 'required|integer',
        'editorial_id'  => 'required|integer',
        'portada'       => 'required|image|mimes:jpg,jpeg,png|max:3072',
        'contraportada' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
        'extra'         => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
    ];
}
}
