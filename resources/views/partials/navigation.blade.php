{{-- <nav class="navbar navbar-expand-lg navbar-light  mb-3">
    <div class="container-fluid">
      <span class="navbar-brand float-md-start" style="margin: 0" href="#">@yield('Titulo')</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end float-md-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          
          @guest
            <a class="nav-link" href="{{route('login')}}">Incio de Sesión</a>
          @else     
          <a class="nav-link" href="{{route('home')}}">Pagina Principal</a>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
        </div>
      </div>
    </div>
  </nav> --}}
<nav>
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="assets/images/Dunder-Mifflin-Emblem.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
                @auth
                <li class="scroll-to-section"><a href="/index" class="active">Home</a></li>
                <li class="scroll-to-section"><a href="{{route('clientes')}}">Clientes</a></li>
                <li class="scroll-to-section"><a href="{{route('vendedores')}}">Vendedores</a></li>
                <li class="scroll-to-section"><a href="{{route('ventas')}}">Ventas</a></li>
                <li class="scroll-to-section"><a href="{{route('comisiones')}}">Comisiones</a></li>
              @endauth
             
              @guest
                <li class="scroll-to-section"><div class="border-first-button"><a href="{{route('login')}}">Login</a></div></li>
                @else     
                <a class="nav-link" href="{{route('home')}}">Pagina Principal</a>
                <li class="scroll-to-section">
                  <a  href="#" style="font-size: 1.5em">
                      {{ Auth::user()->name }}
                  </a>
      
                  {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
      
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div> --}}
              </li>
              <li>
               
                  <a class="" style="color: red" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </li>
              @endguest
               
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
</nav>