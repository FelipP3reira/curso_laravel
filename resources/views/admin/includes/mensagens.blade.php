@if ($mensagem = Session::get('Sucesso'))
   <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Sucesso produto removido com sucesso </span>
          <p>{{ $mensagem }}</p>
        </div>
      </div>  
  @endif