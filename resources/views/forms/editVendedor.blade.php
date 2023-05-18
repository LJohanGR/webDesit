@extends('layouts.app2')
@section('Titulo','Editar Vendedor')
@section('contenido')
<div class="headerTabla mb-5" style="margin-top:120px">
    <button type="button" class="btn btn-light"  onclick="location.href ='/vendedores';">Volver</button>
    <span><h2>Editar vendedor</h2></span>
    <a href="#"></a>
</div>
<div class="mainForms">
    
    @if(!is_null($data))
    <div class="contenido-forms">
        <form action="{{route('editar-vendedor')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row idEdit mb-3">
                <div class="col formLabels">
                    <label for="IDVend">ID</label>
                </div>
                <div class="col">
                    <input type="number" name="IDlVend" class="form-control" id="IDVend" value="{{$data->id}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col formLabels">
                    <label for="nombreVend">Nombre</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="nombreVend" name="nombreVend" aria-describedby="nombreHelp" placeholder="Nombre" value="{{$data->nombre}}">
                </div>
                @error('nombre')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col formApellidos">
                    <label for="apellidosVend">Apellidos</label>
                </div>
                <div class="col">
                    <input type="text" name="apellidoPVend" class="form-control" id="apelidoPVend" aria-describedby="apelidoPHelp" placeholder="Apellido Paterno" value="{{$data->apellido_p}}">
                </div>
                <div class="col">
                    <input type="text" name="apellidoMVend" class="form-control" id="apellidoMVend" aria-describedby="apellidoMHelp" placeholder="Apellido Materno" value="{{$data->apellido_m}}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col formLabels">
                    <label for="antiguedadVend">Antigüedad</label>
                </div>
                <div class="col">
                    <input type="date" name="antiguedadVend" class="form-control" id="antiguedadVend" aria-describedby="antiguedadHelp" placeholder="yyyy-mm-dd" value={{$data->antiguedad}}>
                 </div>
            </div>
            <div class="row">
                @if (Auth::user()->role=="Admin")
                    
                        <div class="col formLabels">
                            <label for="sucursalVend">Sucursal</label>
                        </div>
                        <div class="col">
                            <input type="number" name="sucursalVend" class="form-control" id="sucursalVend" aria-describedby="sucursalHelp" min="1" max="66" value="{{$data->sucursal}}">
                        </div>
                    
                @else
                    <div class="col formLabels">
                        <label for="sucursalVend">Sucursal</label>
                    </div>
                    <div class="col">
                        <input type="number" name="sucursalVend" class="form-control" id="sucursalVend" value="{{$data->sucursal}}" readonly>
                    </div>
                @endif
                
                <div class="col formLabels">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Categoría</label>
                </div>
            
                <div class="col">
                    <select class="form-select" name="categoriaVend" aria-label="Default select example">
                        <option selected value="{{$data->categoria}}" >{{$data->categoria}} (Actual)</option>
                        <option value="Bronce">Bronce</option>
                        <option value="Plata">Plata</option>
                        <option value="Oro">Oro</option>
                        <option value="Diamante">Diamante</option>
                    </select>
                </div>
            
            </div>
           
            <button type="submit" class="btn btn-primary my-1">Submit</button>
        </form>
    </div>
    @endif
</div>
@endsection
