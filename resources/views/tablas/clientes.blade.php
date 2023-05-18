@extends('layouts.app2')
@section('Titulo','Clientes')
@section('contenido')

<div class="car-body" style="justify-content: center;margin-top:120px">
    
    <div class="headerTabla mb-4">
        <button type="button" class="btn btn-light"  onclick="location.href ='/home';">Volver</button>
        <span><h2>Clientes</h2></span>
        @if(Auth::user()->role=="Admin")
            <button type="button" class="btn btn-primary"  onclick="location.href ='/registrar-cliente';">Nuevo</button>
        @else
            <a href=""></a>
        @endif
    </div>
    <table class="table table-bordered">
        <tr class="bg-info">
            <th>Nombre</th>
            <th>Apellido P</th>
            <th>Apellido M</th>
            <th>RFC</th>
            <th>Direccion</th>
            @if(Auth::user()->role=="Admin")
                <th>Sucursal</th>
            @endif
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
        @if(count($data)>0)
        @foreach ($data as $item)
            <tr >
                <td>{{$item->nombre}}</td>
                <td>{{$item->apellido_p}}</td>
                <td>{{$item->apellido_m}}</td>
                <td>{{$item->rfc}}</td>
                <td>{{$item->direccion}}</td>
                @if(Auth::user()->role=="Admin")
                    <td>{{$item->sucursal}}</td>
                @endif
                <td>{{$item->tipo_cliente}}</td>
                <td>
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('editar-cliente',$item->id)}}">
                                @csrf
                                @method('POST')
                                    <input type="submit" value="Editar" class="btn btn-success"/>
                            </form>
                        </div> 
                        @if (Auth::user()->role=="Admin")
                        <div class="col">
                            <form method="post" action="{{route('clientes',$item->id)}}" onsubmit="return confirm('¿Deseas eliminar al cliente?');">
                                @csrf
                                @method('DELETE')
                                    <input type="submit" value="Eliminar" class="btn btn-danger"/>
                            </form>
                        </div>
                        @endif
                    </div>
                </td>
            </tr>
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