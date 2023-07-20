<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('homePage')}}">Home</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Registrati</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Accedi</a>
          </li>
          @endguest
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('product.create')}}">Crea</a></li>
              <li><a class="dropdown-item" href="" onclick="event.preventDefault();
                document.querySelector('#form-destroy').submit();">Cancellami</a></li>
              <form action="{{route('user.destroy')}}" method="POST" class="d-none" id="form-destroy">
                @csrf
                @method('DELETE')
              </form>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a></li>
              <form action="{{route('logout')}}" method="POST" class="d-none" id="logout-form">@csrf</form>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorie
            </a>
            <ul class="dropdown-menu">
              @foreach ($categories as $category)
                  <li><a class="dropdown-item" href="{{route('product.category', $category)}}">{{$category->name}}</a></li>
              @endforeach              
            </ul>
          </li>
          @endauth
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact.us')}}">Contattaci</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>