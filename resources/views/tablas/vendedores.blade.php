@extends('layouts.app2')
@section('Titulo', 'Vendedores')
@section('contenido')

<div class="car-body" style="justify-content: center">
    <div class="headerTabla">
        <button type="button" class="btn btn-light"  onclick="location.href ='/home';">Volver</button>
        <span> <h2>Vendedores</h2></span>
        <button type="button" class="btn btn-primary"  onclick="location.href ='/registrar-vendedor';">Nuevo</button>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Apellido P</th>
            <th>Apellido M</th>
            @if(Auth::user()->role=="Admin")
                <th>Sucursal</th>
            @endif
            <th>Categoria</th>
            <th>Acciones</th>
        </tr>
        @if(count($data)>0)
        @foreach ($data as $item)
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