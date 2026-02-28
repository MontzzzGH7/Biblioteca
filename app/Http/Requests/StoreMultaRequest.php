<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMultaRequest extends FormRequest
{
   public function authorize(): bool {
    return true; // ¡No olvides cambiar esto a true!
}

public function rules(): array {
    return [
        'prestamo_id' => 'required|exists:prestamos,id',
        'monto'       => 'required|numeric|min:0',
        'fecha'       => 'required|date',
        'estado'      => 'required|string'
    ];
}
}
