<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = ['id',
                            'nombre',
                            'apellido_p',
                            'apellido_m',
                            'fecha_nacimiento',
                            'rfc',
                            'direccion',
                            'sucursal',
                            'tipo_cliente'];
                            
}
