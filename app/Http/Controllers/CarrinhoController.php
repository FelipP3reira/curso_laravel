<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinholista(){
        $itens = \Cart::getContent();
      return view('site.carrinho' ,compact('itens'));
    }
    public function adicionaCarrinho(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->quantity),
            'attributes' =>array(
                'image' => $request->img,
            )
            ]);
        return redirect()->route('site.carrinho')->with('Sucesso', 'Produto adicionado ao carrinho!');


        
            
}
     public function removecarrinho(Request $request){
        \Cart::remove($request->id);
         return redirect()->route('site.carrinho')->with('Sucesso', 'Produto removido do carrinho!');
     }

     public function atualizaCarrinho(Request $request){
        \Cart::update($request->id, [
            'quantity'=>[       
                'relative' => false,
                'value' => $request->quantity
                ]
            ]);
        return redirect()->route('site.carrinho')->with('Sucesso', 'Produto atualizado com sucesso!');
     }

    public function limparCarrinho(Request $request){
        \Cart::clear();
         return redirect()->route('site.carrinho')->with('Aviso', 'Seu carrinho esta vazio!');
    }
};

