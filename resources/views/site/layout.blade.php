<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

  
  <ul id='dropdown1' class='dropdown-content'>
    @foreach ($categoriasMenu as $categoriaM)
    <li><a href="{{ route('site.categoria',$categoriaM->id)}}"> {{$categoriaM->nome}} </a></li>
    @endforeach
  </ul>

  <ul id='dropdown2' class='dropdown-content'>
    <li><a href="{{ route('admin.dashboard')}}">Dashboard </a></li>
    <li><a href="{{ route('login.logout')}}">Sair </a></li>
  </ul>

    <nav>
        <div class="red container">
          <a href="#" class="brand-logo center">LuccasCommerce</a>
          <ul id="nav-mobile" class="left">
            <li><a href="{{route('site.index')}}">Home</a></li>
            <li><a href="" class="dropdown-trigger" data-target='dropdown1'><i class="material-icons right">expand_more</i> Categorias</a></li>
            <li><a href="{{route('site.carrinho')}}">Carrinho <span class="new badge red" data-badge-caption=""> {{Cart::content()->count()}}</span></a></li>
          </ul>


          @auth
          <ul id="nav-mobile" class="right">
            <li><a href="" class="dropdown-trigger" data-target='dropdown2'><i class="material-icons right">expand_more</i> Ola {{auth()->user()->firstName}}</a></li>
          </ul>
          @else
          <ul id="nav-mobile" class="right">
            <li><a href="{{route('login.form')}}" ><i class="material-icons right">lock</i> Login </a></li>
          </ul>
          @endauth
          

        </div>
      </nav>

@yield('conteudo')


<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>

var elemDrop = document.querySelectorAll('.dropdown-trigger');

var instanceDrop = M.Dropdown.init(elemDrop, {
          coverTrigger:false,
          constrainWidth:false 
});

</script>
</body>
</html>

    