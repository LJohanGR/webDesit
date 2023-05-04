@extends('layouts.app2')
@section('Titulo','Registrar Vendedor')
@section('contenido')
<div class="headerTabla mb-5">
    <button type="button" class="btn btn-light"  onclick="location.href ='/vendedores';">Volver</button>
    <span><h2>Registrar vendedor</h2></span>
    <a href="#"></a>
</div>
<div class="mainForms">
    
    <div class="contenido-forms">
        <form action="{{route('registrar-vendedor')}}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col formLabels">
                    <label for="nombreVend">Nombre</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="nombreVend" name="nombreVend" aria-describedby="nombreHelp" placeholder="Nombre">
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
                    <input type="text" name="apellidoPVend" class="form-control" id="apelidoPVend" aria-describedby="apelidoPHelp" placeholder="Apellido Paterno">
                </div>
                <div class="col">
                    <input type="text" name="apellidoMVend" class="form-control" id="apellidoMVend" aria-describedby="apellidoMHelp" placeholder="Apellido Materno">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col formLabels">
                    <label for="antiguedadVend">Antigüedad</label>
                </div>
                <div class="col">
                    <input type="date" name="antiguedadVend" class="form-control" id="antiguedadVend" aria-describedby="antiguedadHelp" placeholder="yyyy-mm-dd">
                 </div>
            </div>
            <div class="row">
                @if (Auth::user()->role=="Admin")
                    
                        <div class="col formLabels">
                            <label for="sucursalVend">Sucursal</label>
                        </div>
                        <div class="col">
                            <input type="number" name="sucursalVend" class="form-control" id="sucursalVend" aria-describedby="sucursalHelp" min="1" max="66">
                        </div>
                    
                @else
                    <div class="col formLabels">
                        <label for="sucursalVend">Sucursal</label>
                    </div>
                    <div class="col">
                        <input type="number" name="sucursalVend" class="form-control" id="sucursalVend" value="{{Auth::user()->sucursal}}" readonly>
                    </div>
                @endif
                
                <div class="col formLabels">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Categoría</label>
                </div>
            
                <div class="col">
                    <select class="form-select" name="categoriaVend" aria-label="Default select example">
                        <option selected value="Bronce">Bronce</option>
                        <option value="Plata">Plata</option>
                        <option value="Oro">Oro</option>
                        <option value="Diamante">Diamante</option>
                    </select>
                </div>
            
            </div>
           
            <button type="submit" class="btn btn-primary my-1">Submit</button>
        </form>
    </div>
</div>
@endsection
