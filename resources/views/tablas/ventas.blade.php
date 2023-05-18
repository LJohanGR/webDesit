@extends('layouts.app2')
@section('Titulo','Ventas')
@section('contenido')
<script>
    // (A) RUN THIS ON PAGE LOAD
    window.addEventListener("load", () => {
        var htmlElemento = document.getElementsByTagName("html")[0].style.height;
        var htmlElemento2 = document.querySelector("body");
     /*  document.documentElement.style.height = 100hv; */
      htmlElemento = "100hv";
   
    });
    </script>
<div class="car-body" style="justify-content: center;margin-top:120px">
    <div class="headerTabla">
        <button type="button" class="btn btn-light"  onclick="location.href ='/home';">Volver</button>
        <span> <h2>Ventas</h2></span>
       
        @if(Auth::user()->role=="Admin")
        <button type="button" class="btn btn-primary"  onclick="location.href ='/registrar-venta';">Nueva</button>
        @else
            <a href=""></a>
        @endif
    </div>

    <table class="table table-bordered mt-4">
        <tr class="bg-info">
            <th>Semana</th>
            <th>Cliente</th>
            <th>IDEmpleado</th>
            <th>Tipo</th>
            @if(Auth::user()->role=="Admin")
                <th>Sucursal</th>
            @endif
            <th>Costo</th>
        </tr>
        @if(count($data)>0)
        @foreach ($data as $item)
        {{-- @dump($item) --}}
            <tr>
                <td>{{$item->semana}}</td>
                <td>{{$item->nombre}} {{$item->apellido_p}}</td>
                <td>{{$item->vendedor_id}}</td>
                <td>{{$item->tipo}}</td>
                @if(Auth::user()->role=="Admin")
                    <td>{{$item->sucursal}}</td>
                @endif
                <td><b>{{$item->costo}}</b></td>
            </tr>
            {{--
            <tr>
                <td>{{$item->nombre}}</td>
                <td>{{$item->apellido_p}}</td>
                <td>{{$item->apellido_m}}</td>
                @if(Auth::user()->role=="Admin")
                    <td>{{$item->sucursal}}</td>
                @endif
                <td>{{$item->categoria}}</td>
                <td>
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('editar-vendedor',$item->id)}}">
                                @csrf
                                @method('POST')
                                    <input type="submit" value="Editar" class="btn btn-success"/>
                            </form>
                        </div> 
                        <div class="col">
                            <form method="post" action="{{route('vendedores',$item->id)}}">
                                @csrf
                                @method('DELETE')
                                    <input type="submit" value="Eliminar" class="btn btn-danger"/>
                            </form>
                        </div>
                    </div>
                </td>
            </tr> --}}
        @endforeach
        @else
        <tr><td>No data found</td></tr>
        @endif

    </table>
    <div class="navegacion">
    {!!$data->links()!!}
    </div>
</div>
@endsection