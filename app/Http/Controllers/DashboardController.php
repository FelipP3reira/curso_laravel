<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Produto;

class DashboardController extends Controller
{
    public function index(){

        $usuarios = User::all()->count();
 
        //grafico 1 - usuarios 
        $usersData = User::select([
            DB::RAW('YEAR(created_at) as ano'),
            DB::RAW('Count(*) as total '),
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        //preparar arrays 
        $ano = [];
        $total = [];
        foreach ($usersData as $user){
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        // Se estiver vazio, use uma string vazia para o implode
       $userLabel = "Comparativo de cadastros de usuarios";
        $userAno = $ano; 
        $userTotal = $total;

         //grafico 2 
         $catData = Categoria::withCount('produtos')->get(); 

         $catLabel = [];
         $catTotalArray = []; 

         foreach($catData as $cat){
         $catLabel[] = $cat->nome;
  
        $catTotalArray[] = $cat->produtos_count; 
}


        $catTotal = $catTotalArray;
         



        return view('admin.dashboard', compact('usuarios', 'userLabel' , 'userAno' , 'userTotal', 'catLabel' ,'catTotal'));
    }
}
