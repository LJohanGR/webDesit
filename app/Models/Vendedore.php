<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedore extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id',
                            'nombre',
                            'apellido_p',
                            'apellido_m',
                            'antiguedad',
                            'sucursal',
                            'categoria'];
}
