
@extends('layouts.app2')
@section('Titulo','Inicio')
@section('contenido')

      <main class="px-3">
        <h1>DUNDER MIFFLIN, Inc.</h1>
        <p class="lead">
            
            DUNDER MIFFLIN, Inc. is committed to providing its customers quality office and information technology products, furniture, printing values and the experience required for making informed buyer decisions.
        </p>
        <p class="lead">
            We provide our Customers with the highest standard of integrity and quality, to enable them to develop long-term professional relationships with our employees and staff.
          </p>
        <p class="lead">
          <a href="{{route('login')}}" class="btn btn-lg btn-light fw-bold border-white bg-white">Iniciar Sesión</a>
        </p>
      </main>
@endsection