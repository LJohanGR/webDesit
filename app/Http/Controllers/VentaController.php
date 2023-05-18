<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Auth;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::guest()){
            return redirect()->route('login');
        }
        if(Auth::user()->role=='Manager'){
            return redirect()->route('comisiones');
        }
        if(Auth::user()->role=='Admin'){
            /* $data = DB::table('ventas')->where('sucursal','<',100)->paginate(20); */
            $data = DB::table('ventas')->where('ventas.sucursal','>',0)->join('vendedores', 'vendedores.id','=','ventas.vendedor_id')->join('clientes', 'clientes.id','=','ventas.cliente_id')->select('ventas.*','clientes.nombre','clientes.apellido_p')->paginate(20);
        
            return view('tablas.ventas',compact('data'))->with('i', (request()->input('page',1)-1)*20);
        }
        /* $data = Auth::user()->sucursal;
        return view('tablas.vendedores',$data); */
        $data = DB::table('ventas')->where('sucursal','=',Auth::user()->sucursal)->paginate(20);
        
        /* return DB::select('select ventas.*, vendedores.categoria from ventas INNER JOIN vendedores ON vendedores.id = ventas.vendedor_id where ventas.sucursal=?',[Auth::user()->sucursal])->paginate(20);
         */
        /* return DB::table('ventas')->where('ventas.sucursal','=',Auth::user()->sucursal)->join('vendedores', 'vendedores.id','=','ventas.vendedor_id')->paginate(20);
        */ 
        $data = DB::table('ventas')->where('ventas.sucursal','=',Auth::user()->sucursal)->join('vendedores', 'vendedores.id','=','ventas.vendedor_id')->join('clientes', 'clientes.id','=','ventas.cliente_id')->select('ventas.*','clientes.nombre','clientes.apellido_p')->paginate(20);
        
        return view('tablas.ventas',compact('data'))->with('i', (request()->input('page',1)-1)*20);
    }
    public function idList()
    {
        if(Auth::guest()){
            return redirect()->route('login');
        }
        if(Auth::user()->role=='Manager'){
            return redirect()->route('ventas');
        }
        if(Auth::user()->role=='Admin'){
            $idsClientes = DB::table('clientes')->where('sucursal','>',0)->get();
            $idsVendedores = DB::table('vendedores')->where('sucursal','>',0)->get();
            $data = [$idsClientes, $idsVendedores];
            return view('forms.venta',['data'=>$data]);
        }
        /* $data = Auth::user()->sucursal;
        return view('tablas.vendedores',$data); */
        $idsClientes = DB::table('clientes')->where('sucursal','=',Auth::user()->sucursal)->get();
        $idsVendedores = DB::table('vendedores')->where('sucursal','=',Auth::user()->sucursal)->get();
        $data = [$idsClientes, $idsVendedores];
        return view('forms.venta',['data'=>$data]);
    }
    public function idList2(Request $request)
    {
        $idsClientes = DB::table('clientes')->where('sucursal','=',$request->sucursal)->get();
        $idsVendedores = DB::table('vendedores')->where('sucursal','=',$request->sucursal)->get();
        $data = [$idsClientes, $idsVendedores];
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function getPorcentajeVenta($categoriaVendedor){
            switch($categoriaVendedor)
            {
                case "Diamante":
                    return 0.19;
                    break;
                case "Oro":
                    return 0.12;
                    break;
                case "Plata":
                    return 0.09;
                    break;
                case "Bronce":
                    return 0.05;
                    break;
            }
    }
    public function getPorcentajeRenta($categoriaVendedor){
        switch($categoriaVendedor)
        {
            case "Diamante":
                return 0.12;
                break;
            case "Oro":
                return 0.10;
                break;
            case "Plata":
                return 0.08;
                break;
            case "Bronce":
                return 0.06;
                break;
        }
    }
    public function getComisionClienteN($categoriaVendedor){
        switch($categoriaVendedor)
        {
            case "Diamante":
                return 100;
                break;
            case "Oro":
                return 95;
                break;
            case "Plata":
                return 80;
                break;
            case "Bronce":
                return 70;
                break;
        }
    }
    public function getComisionClienteF($categoriaVendedor){
        switch($categoriaVendedor)
        {
            case "Diamante":
                return 50;
                break;
            case "Oro":
                return 45;
                break;
            case "Plata":
                return 40;
                break;
            case "Bronce":
                return 0;
                break;
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $categoriaVendedor = DB::table('vendedores')->where('id',$request->idVendedor)->value('Categoria');
        $tipoCliente = DB::table('clientes')->where('id',$request->idCliente)->value('tipo_cliente');
        if($request->tipoVenta =='Renta'){
            $parametro = $this->getPorcentajeRenta($categoriaVendedor);
        }else{
            $parametro = $this->getPorcentajeVenta($categoriaVendedor);
        }
        $comision = ($request->costoVenta)*$parametro;
        switch($tipoCliente)
        {
            case "Nuevo":
                $comision += $this->getComisionClienteN($categoriaVendedor);
                break;
            case "Frecuente":
                $comision += $this->getComisionClienteF($categoriaVendedor);
                break;
        }
        $semana = DB::select('SELECT WEEK(NOW()) AS semana;');
        /* idVendedor":"1008","idCliente":"995","tipoVenta":"Compra","costoVenta":"80000"} */
        $venta = new Venta;
        $venta -> cliente_id =  $request -> idCliente;
        $venta -> vendedor_id =  $request -> idVendedor;
        $venta -> tipo =  $request -> tipoVenta;
        $venta -> costo =  $request -> costoVenta;
        $venta -> comision =  $comision;
        $venta -> fecha = $request ->fechaVenta;
        if(Auth::user()->role != 'Admin'){
            $venta->sucursal = Auth::user()->sucursal;
        }else{
            $venta->sucursal = $request->sucursal;
        }
        $venta ->semana = $semana[0]->semana;
        $venta -> save();
        return redirect()->route('ventas');

    }
    
    public function comisiones(){
        if(Auth::guest()){
            return redirect()->route('login');
        }
        if(Auth::user()->role=='Admin'){
            /* $data = DB::table('ventas')->where('sucursal','<',100)->paginate(20); */
            $data = DB::table('ventas')->where('ventas.sucursal','>',0)->join('vendedores', 'vendedores.id','=','ventas.vendedor_id')->select('ventas.*','vendedores.nombre','vendedores.apellido_p','vendedores.categoria','vendedores.apellido_m')->paginate(20);
        
            return view('tablas.comisiones',compact('data'))->with('i', (request()->input('page',1)-1)*20);
        }
        /* $data = Auth::user()->sucursal;
        return view('tablas.vendedores',$data); */
        $data = DB::table('ventas')->where('sucursal','=',Auth::user()->sucursal)->paginate(20);
        
        /* return DB::select('select ventas.*, vendedores.categoria from ventas INNER JOIN vendedores ON vendedores.id = ventas.vendedor_id where ventas.sucursal=?',[Auth::user()->sucursal])->paginate(20);
         */
        /* return DB::table('ventas')->where('ventas.sucursal','=',Auth::user()->sucursal)->join('vendedores', 'vendedores.id','=','ventas.vendedor_id')->paginate(20);
        */ 
        $data = DB::table('ventas')->where('ventas.sucursal','=',Auth::user()->sucursal)->join('vendedores', 'vendedores.id','=','ventas.vendedor_id')->select('ventas.*','vendedores.nombre','vendedores.apellido_p','vendedores.categoria','vendedores.apellido_m')->paginate(20);
        
        return view('tablas.comisiones',compact('data'))->with('i', (request()->input('page',1)-1)*20);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
