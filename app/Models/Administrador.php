<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    use Notifiable;

    protected $table = 'administradores';

    public $timestamps = false; 

    protected $fillable = [
        'usuario', 
        'contraseña', 
        'nombre', 
        'apellido_paterno', 
        'apellido_materno', 
        'estado', 
        'correo', 
        'rol', 
        'foto'
    ]; 


    public function getAuthPassword()
    {
        return $this->contraseña;
    }
}