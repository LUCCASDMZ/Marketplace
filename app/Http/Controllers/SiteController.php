<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\categoria;

use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(3);
    
        return view('site/home',compact('produtos'));
    }

    public function details($slug)
    {
        $produto = Produto::where('slug', $slug)->first();

                    //funciona mesmo sem o codigo abaixo
        //Gate::authorize('ver-produto', $produto);
        //$this->authorize('verProduto', $produto);

                //O icone apararece mas ao clicar e redirecionado para a pagina index
        if(Gate::allows('verProduto', $produto)){
            return view('site.details', compact('produto'));
        }
        if(Gate::denies('verProduto', $produto)) {
            return redirect()->route('site.index');
        }
    }

    public function categoria($id)
    {
        $categoria = Categoria::find($id);
        $produtos = Produto::where('id_categoria', $id)->paginate(3);
        return view('site.categoria',compact('produtos','categoria'));
    }
}
