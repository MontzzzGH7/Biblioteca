<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'prestamos';

    public $timestamps = false;

    protected $fillable = [
        'ejemplar_id',
        'empleado_id',
        'cliente_id',
        'fecha_salida',
        'fecha_devol',
        'estado',
        'costo',

    ];

    public function multa() {

    return $this->hasOne(Multa::class, 'prestamo_id');

}
}
