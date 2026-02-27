<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'libros';

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'autor_id',
        'descripcion',
        'isbn',
        'edicion',
        'fecha_publi',
        'estado',
        'formato_id',
        'idioma_id',
        'genero_id',
        'editorial_id',
        'portada',
        'contraportada',
        'extra'
    ];
}
