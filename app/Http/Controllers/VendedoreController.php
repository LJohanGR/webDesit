<?php

namespace App\Http\Controllers;

use App\Models\Vendedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Auth;
class VendedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::guest()){
            return redirect()->route('login');
        }
        if(Auth::user()->role=='Admin'){
            $data = DB::table('vendedores')->where('sucursal','<',100)->paginate(20);
            return view('tablas.vendedores',compact('data'))->with('i', (request()->input('page',1)-1)*20);
        }
        /* $data = Auth::user()->sucursal;
        return view('tablas.vendedores',$data); */
        $data = DB::table('vendedores')->where('sucursal','=',Auth::user()->sucursal)->paginate(20);
       /*  Select * from 'vendedores' where sucursal = '2' */
        return view('tablas.vendedores',compact('data'))->with('i', (request()->input('page',1)-1)*20);
        
      /*   $data = Vendedore::orderBy('id','desc')->paginate(5);
        return view('tablas.vendedores', compact('data'))->with('i', (request()->input('page',1)-1)*5); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */ 
    public function show(Vendedore $vendedor)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $vendedor)
    {
        foreach ($vendedor->except('_token') as $key => $part) {
            $arr = $key;
          }

        $data = DB::table('vendedores')->where('id','=',$arr)->first();
        return view('forms.editVendedor',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {/* 
        return $request; */
        DB::table('vendedores')->where('id','=',$request->IDlVend)->update(
            ['nombre' => $request->nombreVend,
            'apellido_p'=>$request->apellidoPVend,
            'apellido_m'=>$request->apellidoMVend,
            'antiguedad'=>$request->antiguedadVend,
            'sucursal'=>$request->sucursalVend,
            'categoria'=>$request->categoriaVend
            ]
        );
        return redirect()->route('vendedores');
       /*  ['id',
                            'nombre',
                            'apellido_p',
                            'apellido_m',
                            'antiguedad',
                            'sucursal',
                            'categoria'];
        "IDlVend":"41",
        "nombreVend":"Lorianna",
        "apellidoPVend":"Pierson",
        "apellidoMVend":"Janczyk",
        "antiguedadVend":"2022-04-16",
        "sucursalVend":"2","categoriaVend":"Diamante"} */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $vendedor)
    {
        
        foreach ($vendedor->except('_token') as $key => $part) {
            $arr = $key;
          }
        $deleted = DB::table('vendedores')->where('id','=',$arr)->delete();
        
        return redirect()->route('vendedores');
    }
}
