<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Level Up</title>
  <link rel=icon href="{{asset('images/favicon.png')}}" sizes="20x20" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-light bg-main">
    <div class="container p-1">
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('images/logo.png')}}" width="140" alt="" loading="lazy"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!--<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Análisis</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            @foreach ($categories as $category)
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a href="#" class="dropdown-item link-category d-block ">{{$category->name}}</a></li>
            </ul>
            @endforeach
          </li>-->
          <a class="text-white nav-link active {{ isset($categoryIdSelected)? '': 'selected-category' }}" href="/"><b>Todas</b></a>
          @foreach ($categories as $category)
          <li class="nav-item">
            <a href="{{route('layout.category', $category->name)}}" class="text-white nav-link {{ (isset($categoryIdSelected) && $category->id == $categoryIdSelected)? 'selected-category':'' }}">{{$category->name}}</a>
          </li>
          @endforeach

          @if ($type == 0)
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">Panel Admin</a>
          </li>
          @endif

          @if ($type == 2)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @endif

          @if ($type == 0 || $type == 1)
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          @endif
        </ul>
        <form method="GET" class="d-flex">
          <input class="form-control me-2" name="search" type="text" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">buscar</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- Contenido -->
  @yield('content')

  <!-- Footer -->
  <footer class="container-fluid bg-main">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left p-4">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <img src="{{asset('images/logo.png')}}" alt="levelup logo" width="140" id="logofooter">
          <p class="text-white">Level Up es una plataforma de comunicación especializada en videojuegos.</p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-white text-uppercase">Categorias</h5>
          @foreach ($categories as $category)
          <ul class="list-unstyled">
            <a href="{{route('layout.category', $category->name)}}">
              <li class="text-white mx-3 pb-3 link-category d-block d-md-inline ">{{$category->name}}</li>
            </a>

          </ul>
          @endforeach

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-white text-uppercase">Contactanos</h5>

          <div>
            <a target="_blank" href="{{ url('https://www.facebook.com/') }}" class="red-social fa fa-facebook"></a>
            <a target="_blank" href="{{ url('https://www.instagram.com/') }}" class="red-social fa fa-instagram"></a>
            <a target="_blank" href="{{ url('https://twitter.com/') }}" class="red-social fa fa-twitter"></a>
            <a target="_blank" href="{{ url('https://www.youtube.com/') }}" class="red-social fa fa-youtube"></a>
            <a target="_blank" href="{{ url('https://mx.linkedin.com/') }}" class="red-social fa fa-linkedin"></a>
          </div>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

      <!-- Copyright -->

      <!-- Copyright -->
    </div>
  </footer>

  <div class="text-white footer-copyright text-center py-2">
    <p>&copy; 2022 <b>Level Up</b> - Todos los Derechos Reservados.</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
</body>

</html>