<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Produto; 
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
   
    public function index()
    {
        //return "index"
       $produtos = Produto::paginate(5);
       $categorias = Categoria::all();
       return view( 'admin.produtos', compact('produtos','categorias'));

    }

    
    public function create()
    {
        return redirect()->route('admin.produtos')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    
    public function store(Request $request)
    {
        $produto = $request->all();
        
       
        $produto['slug'] = Str::slug($request->nome);
        
    
        $produto['user_id'] = auth()->user()->id;
        
        if ($request->hasFile('imagem')) {
            $produto['imagem'] = $request->file('imagem')->store('produtos', 'public');}
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
        $produto = Produto::find($id);
        
     
        if ($produto->imagem) {
            Storage::disk('public')->delete($produto->imagem);
        }
        
        $produto->delete(); 
        return redirect()->route('admin.produtos');
    }
}
