@extends('layouts.app2')
@section('Titulo','Pagina Principal')
@section('contenido')
<div class="row justify-content-center" style="margin-top:120px">
<div class="container " id="mainHome" >
    <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="/vendedores">Vendedores</a>
              </h3>
              <p class="card-text mb-auto">Información de los vendedores dentro de la sucursal</p>
              <p class="card-text mb-auto">Aquí puede visualizar y modificar la información guardada de los vendedores contratados en esta sucursal.</p>
              <a href="/vendedores">Ir al sitio</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block"  alt="Thumbnail [200x250]" style="width: 400px; height: 250px;" src="/images/Empleados.jpg" data-holder-rendered="true">
          </div>
        </div>{{-- data-src="holder.js/200x250?theme=thumb" --}}
        
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="/clientes">Clientes</a>
              </h3>
              <p class="card-text mb-auto">Información de los clientes de esta sucursal</p>
              <p class="card-text mb-auto">Aquí puede visualizar y modificar la información guardada de los clientes (nuevos y frecuentes) que han comprado o rentado los servicios en esta sucursal.</p>
              <a href="/clientes">Ir al sitio</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block"  alt="Thumbnail [200x250]" style="width: 475px; height: 250px;" src="/images/Clientes.jpg" data-holder-rendered="true">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="/ventas">Ventas</a>
              </h3>
              <p class="card-text mb-auto">Ventas semanales</p>
              <p class="card-text mb-auto">Aquí puede visualizar las ventas o rentas realizadas, así como registrar una nueva venta.</p>
              <a href="/ventas">Ir al sitio</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block"   alt="Thumbnail [200x250]" style="width: 325px; height: 250px;" src="/images/Ventas.jpg" data-holder-rendered="true">
          </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
              <div class="card-body d-flex flex-column align-items-start">
                <h3 class="mb-0">
                  <a class="text-dark" href="{{route('comisiones')}}">Calculo de comisiones semanal</a>
                </h3>
                <p class="card-text mb-auto">Realizar el calculo semanal</p>
                <p class="card-text mb-auto">Aquí puede visualizar el calculo de comisiones que recibirán los vendedores respecto a las ventas(o rentas) realizadas en la semana.</p>
                <a href="{{route('comisiones')}}">Ir al sitio</a>
              </div>
              <img class="card-img-right flex-auto d-none d-md-block"  alt="Thumbnail [200x250]" style="width: 450px; height: 250px;" src="/images/Comisiones.jpg" data-holder-rendered="true">
            </div>
          </div>
      </div>
</div>
</div>
@endsection
