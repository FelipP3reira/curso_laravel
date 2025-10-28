<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Categoria;

use Illuminate\Support\Facades\Gate;        

class SiteController extends Controller
{
     public function index()
    {
        //return "index"
       $produtos = produto::paginate(3);
       
      return view( 'site.home', compact('produtos'));
    }

    public function details($slug){
        $produto = produto::where('slug', $slug)->first();
        Gate::authorize('ver-produto',$produto);

        if(Gate::denies('ver-produto', $produto)){
            return view('site.details', cache('produto'));
        }
        return view('site.details', compact('produto'));
    }
 public function categoria($id){
        $categoria = Categoria::find($id) ;
        $produtos = produto::where('id_categoria', $id)->paginate(3);
        
        return view('site.categoria', compact('produtos','categoria'));
    }


}

