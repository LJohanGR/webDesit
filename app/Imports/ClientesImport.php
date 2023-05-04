<?php

namespace App\Imports;

use App\Models\Clientes;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Clientes([
            "id" => $row['id'],
            "nombre"=> $row['nombre'],
            "apellido_p"=> $row['apellido_p'],
            "apellido_m"=> $row['apellido_m'],
            "fecha_nacimiento"=> $row['fecha_nacimiento'],
            "rfc"=> $row['rfc'],
            "direccion"=> $row['direccion'],
            "sucursal"=> $row['sucursal'],
            "tipo_cliente"=> $row['tipo_cliente']
            
        ]);
    }
}

