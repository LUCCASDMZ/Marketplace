<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $itens = Cart::content();
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => abs($request->quantity),
            'options' => [
                'image' => $request->img,
            ]
        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso!');
    }

    public function removeCarrinho(Request $request)
    {
        Cart::remove($request->rowId);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido do carrinho com sucesso!');
    }

    public function atualizaCarrinho(Request $request)
    {
        Cart::update($request->rowId,[
            'qty'=> abs($request->qty),
            ]);
            return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado no carrinho com sucesso!');
    }

    public function limparCarrinho()
    {
        Cart::destroy();
        return redirect()->route('site.carrinho')->with('aviso', 'Carrinho limpo com sucesso!');
    }

}
