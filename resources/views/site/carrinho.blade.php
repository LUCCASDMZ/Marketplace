@extends('site/layout')
@section('title', 'home')
@section('conteudo')
    
<div class="row container">

    @if ($mensagem = Session::get('sucesso'))

        <div class="card green">
            <div class="card-content white-text">
              <span class="card-title">Parabens!</span>
              <p>{{$mensagem}}</p>
            </div>
          </div>
    @endif

    @if ($mensagem = Session::get('aviso'))

        <div class="card blue">
            <div class="card-content white-text">
              <span class="card-title"></span>
              <p>{{$mensagem}}</p>
            </div>
          </div>
    @endif

    @if ($itens->count() == 0)
      <div class="card orange">
          <div class="card-content white-text">
            <span class="card-title">Seu carrinho esta vazio</span>
            <p>Aproveite nossas promoções</p>
          </div>
        </div>
    @else
      <h5>Seu carrinho possui {{$itens->count()}} produtos.</h5>
      <table class="striped">
          <thead>
              <tr>
                  <th></th>
                  <th>Nome</th>
                  <th>Preço</th>
                  <th>Quantidade</th>
                  <th></th>
              </tr>
          </thead>
          
          @foreach ($itens as $item)
          <tbody>
            <tr>
              <td><img src="{{$item->options->image}}" alt="" class="responsive-img circle" width="70"></td>
              <td>{{$item->name}}</td>
              <td>R${{number_format($item->price, 2, ',','.')}}</td>
              
                  {{-- BTN ATUALIZAR --}}
                  <form action="{{route('site.atualizacarrinho')}}" method="post" enctype="multipart/form-data">
                    @csrf
                      <input type="hidden" name="rowId" value="{{$item->rowId}}">
                      <td><input min="1" style="width: 40px font-weight:900;" class="white center" type="number" name="qty" value="{{$item->qty}}"></td>
                      <td>   
                      <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i>
                      </button>
                  </form>

                  
                  {{-- BTN REMOVER --}}
                  <form action="{{route('site.removecarrinho')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="rowId" value="{{$item->rowId}}">
                      <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i>
                      </button>
                  </form>
                  
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>   

        <div class="card orange">
          <div class="card-content white-text">
            <span class="card-title">TOTAL: R$ {{number_format(Cart::subtotal(), 2, ',','.')}}</span>
            <p>pague em 12x sem juros</p>
          </div>
        </div>
    @endif

    
      <div class="row container center">
        <a href="{{route('site.index')}}" class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i>
        </a>
        <a href="{{route('site.limparcarrinho')}}" class="btn waves-effect waves-light red">Limpar carrinho<i class="material-icons right">clear</i>
        </a>
        <button class="btn waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i>
        </button>
      </div>

</div>

@endsection

