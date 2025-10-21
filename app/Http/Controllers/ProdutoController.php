<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
   
    public function index()
    {
        //return "index"
       //$produtos = Produto::all();
       // return dd($produtos);
       $nome = "rodrigo";
       $idade = 28;
       $html = "<h1> Ola </h1>"; 
      //return view('news', ['nome' => $nome, 'idade' => $idade, 'html' => $html]);
      return view( 'site.home', compact('nome','idade','html'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

  
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
