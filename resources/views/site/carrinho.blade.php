@extends('site.layout')
@section('title', 'Carrinho de compras')
@section('conteudo')

<div class="row container">


  @if ($mensagem = Session::get('Sucesso'))
   <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Sucesso</span>
          <p>{{ $mensagem }}</p>
        </div>
      </div>  
  @endif

  @if ($mensagem = Session::get('Aviso'))
   <div class="card blue darken-1">
        <div class="card-content white-text">
          <span class="card-title">Tudo bem !</span>
          <p>{{ $mensagem }}</p>
        </div>
      </div>  
  @endif

  @if ($itens->count() ==  0)
   <div class="card orange darken-1">
        <div class="card-content white-text">
          <span class="card-title">Seu carrinho esta vazio!</span>
          <p>Aproveite nossas promocoes!!</p>
        </div>
      </div>  

  @else
  <div class="card orange darken-1">
        <div class="card-content white-text">
          <span class="card-title">Seu carrinho possui:{{ $itens->count() }} produtos .</span>
          <p></p>
        </div>
      </div>  
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
        <tbody>
            @foreach ($itens as $item)
          <tr>
            <td><img src="{{ $item->attributes->image }}" alt="" width="70px" class="responsive-img circle"> </td>
            <td>{{ $item->name }}</td>
          <td>
    {{ 'R$ ' . number_format($item->price, 2, ',', '.') }}
          </td>
           {{-- BTN ATUALIZAR --}}
            <form action="{{ route('site.atualizacarrinho') }}" method="POST" enctype="multipart/form-data"> 
               @csrf
               <input type="hidden" name="id" value="{{ $item->id }}">
            <td> <input style="width: 40px; font-weight:900;" class="with center" min="1" type="number" name="quantity" value="{{ $item->quantity}}"></td>
            <td>
            <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button> 
            </form>
          <td>  
              
            
             {{-- BTN REMOVER --}}
            <form action="{{ route('site.removecarrinho') }}" method="post" enctype="multipart/form-data">
               @csrf
              @method('DELETE')<input type="hidden" name="id" value="{{ $item->id }}">
              <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button> 
            </form>
          </td>
          </tr>
            @endforeach
        </tbody>  
      </table>
      
      <div class="card green darken-4">
        <div class="card-content white-text">
          <span class="card-title truncate">Valor total:{{ 'R$ ' . number_format(\Cart::getTotal(),2, ',', '.')}}</span>
          <p>Pague em ate 12x sem juros!</p>
        </div>
      </div>  
  @endif


   

      <div class="row container center">
        <a href="{{ route('site.index') }}" class="btn-large waves-effect waves-light blue">Continuar comprando <i class="material-icons right">arrow_back</i></button>
        
        <a href="{{ route('site.limparcarrinho') }}" class="btn-large waves-effect waves-light blue">Limpar carrinho <i class="material-icons right">clear</i></a>

        <button class="btn-large waves-effect waves-light green">finalizar pedido <i class="material-icons right">check</i></button>

      </div>
            
   
</div>      



@endsection