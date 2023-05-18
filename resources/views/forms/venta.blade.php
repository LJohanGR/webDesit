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
<div class="headerTabla mb-5" style="margin-top:120px">
    <button type="button" class="btn btn-light"  onclick="location.href ='/ventas';">Volver</button>
    <span><h2>Registrar Venta</h2></span>
    <a href="#"></a>
</div>
<div style="display:flex;justify-content: center;margin-bottom:45px">
    <div class="row mb-3" style="justify-content: center">
        @if (Auth::user()->role=="Admin")
                
                        <div class="col formLabels succ" style="max-width: 50%">
                            <label for="sucursalClient">Sucursal</label>
                        </div>
                        <div class="col">
                            <select class="form-select" id="sucursal" name="succ" aria-label="Default select example" onclick=selectTrigger()>
                                <script language="javascript" type="text/javascript"> 

                                    for(var d=1;d<=66;d++)
                                    {
                                        document.write("<option>"+d+"</option>");
                                    }
                                    </script>
                            </select>
                        </div>
                        
                        <button  class="btn btn-primary my-1" id="setSucursalbtn" style="max-width: 45%" >Aceptar</button>
                        {{-- <div class="col succ">
                            <input type="number" name="sucursalClient" class="form-control" id="sucursalClient" aria-describedby="sucursalHelp" min="1" max="66">
                        </div> --}}
                    
                @else
                    <div class="col formLabels succ">
                        <label for="sucursalClient">Sucursal</label>
                    </div>
                    <div class="col succ">
                        <input type="number" name="sucursalClient" class="form-control" id="sucursalClient" value="{{Auth::user()->sucursal}}" readonly>
                    </div>
                @endif
    </div>
</div>
<div class="mainForms ventaForm" id="formsVenta" style="display: none">
    
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
                        <select class="form-select" name="idVendedor" aria-label="Default select example" id="IDsVendedores">
                            <option selected value="default">Elegir...</option>
                            @foreach ($data[1] as $item)
                                <option class="opcVendedores" value="{{$item->id}}">{{$item->id}}</option>
                            @endforeach
                        </select>
                      {{--   <input list="idVendedor" name="idVendedor">
                        <datalist id="idVendedor"  name="idVendedor" aria-label="Default select example">
                            <option selected value="default">Elegir...</option>
                            @foreach ($data[1] as $item)
                                <option value="{{$item->id}}">{{$item->id}}</option>
                            @endforeach
                            
                        </datalist> --}}
                    </div>
                    <div class="col formLabels">
                        <label for="idCliente">ID Cliente</label>
                    </div>
                    <div class="col">

                        <select class="form-select"  name="idCliente"  aria-label="Default select example" id="IDsClientes">
                            <option selected value="default">Elegir...</option>
                            @foreach ($data[0] as $item)
                                <option class="opcClientes" value="{{$item->id}}">{{$item->id}}</option>
                            @endforeach
                        </select>

                        {{-- <input list="idClientes" name="idCliente" >
                        <datalist id="idClientes"  name="idCliente" aria-label="Default select example">
                            <option selected value="default">Elegir...</option>
                            @foreach ($data[0] as $item)
                                <option value="{{$item->id}}">{{$item->id}}</option>
                            @endforeach
                            
                        </datalist> --}}
                        
                    </div>
                    <div class="col btnNuevoC">
                        <button type="button" class="btn btn-success" onclick="location.href ='/registrar-cliente';">Nuevo</button>
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
                <input type="hidden" name="sucursal" id="sucursalHidden">
            <button type="submit" class="btn btn-primary my-1">Submit</button>
        </form>
    </div>
</div>
<script>
     /* $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); */
    $("#form").submit( function(eventObj) {
      $("<input />").attr("type", "hidden")
          .attr("name", "something")
          .attr("value", "something")
          .appendTo("#form");
      return true;
  });
    function selectTrigger(){
            var contenido = document.getElementById("formsVenta");
        if (contenido.style.display === "block") {
                contenido.style.display = "none";
            }
    }
         $('#setSucursalbtn').click(function(){
            var contenido = document.getElementById("formsVenta");
            var sucursal = document.getElementById("sucursal").value;
            var idsVendedores = document.getElementById("IDsVendedores");
            var idsClientes = document.getElementById("IDsClientes");
            var sucursalHidden = document.getElementById("sucursalHidden");

            sucursalHidden.value=sucursal;
           

            var options = document.querySelectorAll('.opcVendedores');
            options.forEach(o => o.remove());
           

            var optionsC = document.querySelectorAll('.opcClientes');
            optionsC.forEach(o => o.remove());
            

            if (contenido.style.display === "none") {
                contenido.style.display = "block";
             }

            //we will send data and recive data fom our AjaxController
            //alert("im just clicked click me");
            $.ajax({
               url:'{{route('ajax')}}',
               data:{ "_token": "{{ csrf_token() }}", 
                'sucursal':sucursal},
               type:'post',
               success:  function (response) {
                  response[1].forEach(element => {
                    var opt = document.createElement('option');
                    opt.value=element['id'];
                    opt.classList.add("opcVendedores");
                    opt.innerHTML =element['id'];
                    idsVendedores.appendChild(opt);
                  });

                  response[0].forEach(element => {
                    var opt = document.createElement('option');
                    opt.value=element['id'];
                    opt.classList.add("opcClientes");
                    opt.innerHTML =element['id'];
                    idsClientes.appendChild(opt);
                  });
                 /*  for(var i=0;i<=response[0].length) */
               },
               statusCode: {
                  404: function() {
                     alert('web not found');
                  }
               },
               error:function(x,xs,xt){
                  window.open(JSON.stringify(x));
                  //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
               }
            });
        });
   /*  function show(){
       
        var contenido = document.getElementById("formsVenta");
        console.log(contenido)
        console.log(contenido.style.display)
        if (contenido.style.display === "none") {
            contenido.style.display = "block";
        }

        
            //we will send data and recive data fom our AjaxController
            //alert("im just clicked click me");
        $.ajax({
            url:'miJQueryAjax',
            data:{'name':'luis'},
            type:'post',
            success:  function (response) {
                alert(response);
            },
            statusCode: {
                404: function() {
                    alert('web not found');
                }
            },
            error:function(x,xs,xt){
                window.open(JSON.stringify(x));
                //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }

        });
        
    } */
    

</script>
@endsection