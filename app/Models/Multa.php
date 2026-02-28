<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{

    protected $table = 'multas';
    public $timestamps = false;
    protected $fillable = ['prestamo_id', 'monto', 'fecha', 'estado'];

    public function pedido() {
        return $this->belongsTo(Pedido::class, 'prestamo_id');
    }

    
}