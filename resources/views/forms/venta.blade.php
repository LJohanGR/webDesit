@extends('layouts.app2')
@section('Titulo','Registrar Venta')
@section('contenido')

<script>
   window.onload = function(){
    var fecha = new Date();
    
    var day = ("0" + fecha.getDate()).slice(-2);
    var month = ("0" + (fecha.getMonth() + 1)).slice(-2);

    var fechaActual = fecha.getFullYear()+"-"+(month)+"-"+(day);

    const firstDay = new Date(fecha.setDate(fecha.getDate() - fecha.getDay()));
    var fechaInicio =  fecha.getFullYear()+"-"+(month)+"-"+(("0" + firstDay.getDate()).slice(-2));
    
    /* let d = new Date(d);
    var day = d.getDay(),
    diff = d.getDate() - day + (day == 0 ? -6:1);
    console.log(new Date(d.setDate(diff))); */
    $('#fechaVenta').val(fechaActual);
    document.getElementById("fechaVenta").min=fechaInicio;
     document.getElementById("fechaVenta").max=fechaActual;
   }
</script>
<div class="headerTabla mb-5">
    <button type="button" class="btn btn-light"  onclick="location.href ='/ventas';">Volver</button>
    <span><h2>Registrar Venta</h2></span>
    <a href="#"></a>
</div>
<div class="mainForms">
    
    <div class="contenido-forms">
        <form action="{{route('registrar-venta')}}" method="POST">
            @csrf

            {{-- <th>IDCliente</th>
            <th>IDEmpleado</th>
            <th>Tipo</th>
            @if(Auth::user()->role=="Admin")
                <th>Sucursal</th>
            @endif
            <th>Costo</th>
            <th>Fecha</th>
            <th>Semana</th> --}}
                <div class="row mb-3">
                    <div class="col formLabels">
                        <label for="idVendedor">ID Vendedor</label>
                    </div>
                    <div class="col">
                        <select class="form-select" name="idVendedor" aria-label="Default select example">
                            <option selected value="default">Elegir...</option>
                            @foreach ($data[1] as $item)
                                <option value="{{$item->id}}">{{$item->id}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="col formLabels">
                        <label for="idCliente">ID Cliente</label>
                    </div>
                    <div class="col">
                        <select class="form-select" name="idCliente" aria-label="Default select example">
                            <option selected value="default">Elegir...</option>
                            @foreach ($data[0] as $item)
                                <option value="{{$item->id}}">{{$item->id}}</option>
                            @endforeach
                            
                        </select>
                        
                    </div>
                    <div class="col btnNuevoC">
                        <button class="btn btn-success">Nuevo</button>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col formLabels">
                        <label for="tipoVenta">Tipo</label>
                    </div>
                    <div class="col" style="display: flex">
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoVenta" id="tipoVentaInline1" value="Compra" checked="checked">
                        <label class="form-check-label" for="tipoVentaInline1">Venta</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoVenta" id="tipoVentaInline2" value="Renta">
                        <label class="form-check-label" for="tipoVentaInline2">Renta</label>
                      </div>

                      
                    </div>
                    <div class="col formLabels">
                        <label for="costoVenta">Costo</label>
                    </div>
                    
                    <div class="col">
                        <input type="number" class="form-control" id="costoVenta" name="costoVenta" aria-describedby="costoHelp" placeholder="0.0" min=0 step=".01">
                    </div>
                </div>
                <div class="row">
                    <div class="col formLabels">

                        <label for="fechaVenta">Fecha</label>
                    </div>
                    <div class="col">
                        <input type="date" name="fechaVenta" class="form-control" id="fechaVenta" aria-describedby="fechaNHelp"  >
                     </div>
                </div>
          
            <button type="submit" class="btn btn-primary my-1">Submit</button>
        </form>
    </div>
</div>

@endsection