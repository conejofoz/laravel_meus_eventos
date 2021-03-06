<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="{{route('home')}}">Eventos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorias
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach ($categories as $category)
                <a class="dropdown-item" href="{{route('home', ['category' => $category->slug ])}}">{{$category->name}}</a>
              @endforeach
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar evento" aria-label="Search" name="s" value="{{request()->query('s')}}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>

      <ul class="navbar-nav">
        @auth
          <li class="nav-item">
            <a href="{{route('admin.events.index')}}" class="nav-link">Meu Painel</a>
          </li>
        @else 
          <li class="nav-item">
            <a href="{{route('login')}}" class="nav-link">Acessar Conta</a>
          </li>
        @endauth
      </ul>
    </div>
</nav>