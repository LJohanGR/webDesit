<nav class="navbar navbar-expand-lg navbar-light  mb-3">
    <div class="container-fluid">
      <span class="navbar-brand float-md-start" style="margin: 0" href="#">@yield('Titulo')</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end float-md-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          
          @guest
            <a class="nav-link" href="{{route('login')}}">Incio de Sesión</a>
            <a class="nav-link" href="/register">Registro</a>
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
  </nav>
  