<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = User::all()->count();

        //grafico 1 - usuarios
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*)as total')
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();
        
        //preparar arrays
        foreach($usersData as $user){
            $ano [] = $user->ano;
            $total[] = $user->total;
        }

        //formatar para o chartjs
        $userLabel = "'Comparativo de cadastro de usuarios'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        //grafico 2 - categorias
        $catData = Categoria::with('produtos')->get();

        //preparar array
        foreach ($catData as $cat) {
            $catNome[] = "'".$cat->nome."'";
            $catTotal[] = $cat->produtos->count();
        }

        //formatar para chartjs
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);


        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
