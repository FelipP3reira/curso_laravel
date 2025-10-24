@extends('site.layout')
@section('title', 'Essa e a pagina DETAILS')
@section('conteudo')

<div class="row container "> <br>
    <div class="col s12 m6">
          <img src="{{ $produto->imagem }}" class="responsive-img">
          
    </div>
    <div class="col s12 m6">
        <h4> {{ $produto->nome }}</h4>
        <h5> R${{ number_format($produto->preco, 2, ',','.') }}</h5>
         <p> {{ $produto->descricao}} </p>
         <p>Postado por: {{ $produto->user->firstName}} <br>
             Categoria: {{ $produto->categoria->nome }}
         </p>
        
         
         <button class="btn orange btn-large">Comprar</button>
</div>









@endsection