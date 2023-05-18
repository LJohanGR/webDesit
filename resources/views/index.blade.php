
@extends('layouts.app2')
@section('Titulo','Inicio')
@section('contenido')

<main class="px-3 main-banner wow fadeIn">
<div class="row justify-content-center ">
        <h1>DUNDER MIFFLIN, Inc.</h1>
        <p class="lead mensajeHome">
            
            DUNDER MIFFLIN, Inc. is committed to providing its customers quality office and information technology products, furniture, printing values and the experience required for making informed buyer decisions.
        </p>
        <p class="lead mensajeHome">
            We provide our Customers with the highest standard of integrity and quality, to enable them to develop long-term professional relationships with our employees and staff.
          </p>
          @guest
        <p class="lead mensajeHome mt-5">
          <a href="{{route('login')}}" class="btn btn-lg btn-primary fw-bold ">Iniciar Sesión</a>
        </p>
        @endguest
</div>
      </main>
@endsection