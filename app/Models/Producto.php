<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'libros';

    public $timestamps = false;

    // Agrega esto para que el controlador pueda guardar los datos
    protected $fillable = [
        'titulo', // Supongo que usas titulo por ser libros
        'autor',
        'precio',
        'stock',
        'estado', 
        'foto'
    ];
}