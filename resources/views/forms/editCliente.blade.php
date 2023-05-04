@extends('layouts.app2')
@section('Titulo','Registrar Cliente')
@section('contenido')
    
<div class="headerTabla mb-5">
    <button type="button" class="btn btn-light"  onclick="location.href ='/clientes';">Volver</button>
    <span><h2>Registrar vendedor</h2></span>
    <a href="#"></a>
</div>
<div class="mainForms">
    
    @if(!is_null($data))
    <div class="contenido-forms">
        <form action="{{route('editar-cliente')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row idEdit mb-3">
                <div class="col formLabels">
                    <label for="IDClient">ID</label>
                </div>
                <div class="col">
                    <input type="number" name="IDlClient" class="form-control" id="IDClient" value="{{$data->id}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col formLabels">
                    <label for="nombreClient">Nombre</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="nombreClient" name="nombreClient" aria-describedby="nombreHelp" placeholder="Nombre" value="{{$data->nombre}}">
                </div>
                @error('nombre')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col formApellidos">
                    <label for="apellidosClient">Apellidos</label>
                </div>
                <div class="col">
                    <input type="text" name="apellidoPClient" class="form-control" id="apelidoPClient" aria-describedby="apelidoPHelp" placeholder="Apellido Paterno" value="{{$data->apellido_p}}">
                </div>
                <div class="col">
                    <input type="text" name="apellidoMClient" class="form-control" id="apellidoMClient" aria-describedby="apellidoMHelp" placeholder="Apellido Materno" value="{{$data->apellido_m}}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col formLabels formFecha">
                    <label for="fechaNClient">Fecha de Nacimiento</label>
                </div>
                <div class="col">
                    <input type="date" name="fechaNClient" class="form-control" id="fechaNClient" aria-describedby="fechaNHelp" placeholder="yyyy-mm-dd" value={{$data->fecha_nacimiento}}>
                 </div>
            </div>
            <div class="row mb-3">
                
                <div class="col formLabels">
                    <label for="direccionClient">Dirección</label>
                </div>
                <div class="col">
                    <input type="text" name="direccionClient" class="form-control" id="direccionClient" aria-describedby="direccionClientHelp" placeholder="Direccion" value="{{$data->direccion}}">
                </div>

                @if (Auth::user()->role=="Admin")
                    
                        <div class="col formLabels succ">
                            <label for="sucursalClient">Sucursal</label>
                        </div>
                        <div class="col succ">
                            <input type="number" name="sucursalClient" class="form-control" id="sucursalClient" aria-describedby="sucursalHelp" min="1" max="66" value="{{$data->sucursal}}">
                        </div>
                    
                @else
                    <div class="col formLabels succ">
                        <label for="sucursalClient">Sucursal</label>
                    </div>
                    <div class="col succ">
                        <input type="number" name="sucursalClient" class="form-control" id="sucursalClient" value="{{$data->sucursal}}" readonly>
                    </div>
                @endif
            </div>
            <div class="row">
                
                
                <div class="col formLabels">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Tipo</label>
                </div>
            
                <div class="col">
                    <select class="form-select" name="categoriaClient" aria-label="Default select example">
                        <option selected value="{{$data->tipo_cliente}}">{{$data->tipo_cliente}}(Actual)</option>
                        <option value="Nuevo">Nuevo</option>
                        <option value="Frecuente">Frecuente</option>
                    </select>
                </div>

                <div class="col formLabels">
                    <label for="rfcClient">RFC</label>
                </div>
                <div class="col">
                    <input type="text" name="rfcClient" class="form-control" id="rfcClient" aria-describedby="rfcClientHelp" placeholder="RFC" value="{{$data->rfc}}">
                </div>
            </div>
           
            <button type="submit" class="btn btn-primary my-1">Submit</button>
        </form>
    </div>
    @endif
</div>
@endsection