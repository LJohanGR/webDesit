<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\Vendedore;
use App\Models\Cliente;

class registrar extends Controller
{
    public function store(Request $request){
        /* return $request; */
        /* $request->validate([
            'nombreVend' => ['required', 'string', 'max:255'],
            'apellidoPVend' => ['required', 'string', 'max:255'],
            'antiguedadVend' => ['required', 'string', 'max:255'],
            'sucursalVend' => ['required', 'integer'],
            'categoriaVend' => ['required', 'string', 'max:255'],
        ]); */
        $vendedor = new Vendedore;
        $vendedor -> nombre = $request-> nombreVend;
        $vendedor -> apellido_p = $request-> apellidoPVend;
        $vendedor -> apellido_m = $request-> apellidoMVend;
        $vendedor -> antiguedad = $request-> antiguedadVend;
        $vendedor -> sucursal = $request-> sucursalVend;
        $vendedor -> categoria = $request-> categoriaVend;
        
        $vendedor -> save();
        return redirect()->route('vendedores');
        /* ['id',
        'nombre',
        'apellido_p',
        'apellido_m',
        'antiguedad',
        'sucursal',
        'categoria']; */
    }

    public function storeCliente(Request $request){
        
        $cliente = new Cliente;
        $cliente -> nombre =  $request -> nombreClient;
        $cliente -> apellido_p =  $request -> apellidoPClient;
        $cliente -> apellido_m =  $request -> apellidoMClient;
        $cliente -> fecha_nacimiento =  $request -> fechaNClient;
        $cliente -> rfc =  $request -> rfcClient;
        $cliente -> direccion =  $request -> direccionClient;
        $cliente -> sucursal =  $request -> sucursalClient;
        $cliente -> tipo_cliente =  $request -> categoriaClient;
        
        $cliente -> save();
        return redirect()->route('clientes');
        
    }
}
