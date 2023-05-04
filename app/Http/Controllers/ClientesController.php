<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Auth;

class ClientesController extends Controller
{
    public function index(){
        if(Auth::guest()){
            return redirect()->route('login');
        }
        if(Auth::user()->role=='Admin'){
            $data = DB::table('clientes')->where('sucursal','<',100)->paginate(20);
            return view('tablas.clientes',compact('data'))->with('i', (request()->input('page',1)-1)*20);
        }
        /* $data = Auth::user()->sucursal;
        return view('tablas.vendedores',$data); */
        $data = DB::table('clientes')->where('sucursal','=',Auth::user()->sucursal)->paginate(20);
        return view('tablas.clientes',compact('data'))->with('i', (request()->input('page',1)-1)*20);;
    }
    public function edit(Request $cliente)
    {
        foreach ($cliente->except('_token') as $key => $part) {
            $arr = $key;
          }
        
        $data = DB::table('clientes')->where('id','=',$arr)->first();
        return view('forms.editCliente',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('clientes')->where('id','=',$request->IDlClient)->update(
            ['nombre'=> $request->nombreClient,
            'apellido_p'=> $request->apellidoPClient,
            'apellido_m'=> $request->apellidoMClient,
            'fecha_nacimiento'=> $request->fechaNClient,
            'direccion' => $request->direccionClient,
            'sucursal'=> $request->sucursalClient,
            'tipo_cliente'=> $request->categoriaClient,
            'rfc'=> $request->rfcClient
            ]
        );
        return redirect()->route('clientes');
    }


    public function destroy(Request $cliente)
    {
        foreach ($cliente->except('_token') as $key => $part) {
            $arr = $key;
          }
        $deleted = DB::table('clientes')->where('id','=',$arr)->delete();
        
        return redirect()->route('clientes');
    }
    
}
