
<form action="{{route('login.auth')}}" method="post">
    @csrf
    Email: <input name="email"><br>
    Senha: <input type="password" name="password"><br>
    <input type="checkbox" name="remember" >Lembrar-me <br>
    <button type="submit">Entrar</button> 
    <p>Ou</p>
    </form>
    
    <form action="{{route('login.create')}}" method="get">
        <button type="submit">Registre-se</button>
    </form>


@if ($mensagem = Session::get('erro'))
    {{$mensagem}}
@endif

@if ($errors->any() )
    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif