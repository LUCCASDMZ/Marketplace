@if ($errors->any() )
    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif

<form action="{{route('users.store')}}" method="post">
    @csrf
    Nome: <input type="text"  name="firstName"><br>
    Sobrenome: <input type="text"  name="lastName"><br>
    Email: <input  name="email"><br>
    Senha: <input type="password" name="password"><br>

    <button type="submit">Cadastrar</button><br>
</form>