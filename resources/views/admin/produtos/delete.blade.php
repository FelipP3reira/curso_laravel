<div id="modal-delete-{{ $produto->id }}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i>Tem certeza?</h4>
        <div class="row">
        <p>Tem certeza que deseja excluir {{ $produto->nome }}?</p>
       
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a><br>
        
        <form action="{{ route('admin.produto.delete', $produto->id) }}" method="POST">
            @method('DELETE')
            @csrf
      {{-- O botão de submit deve ser APENAS o <button> --}}
      <button type="submit" class="waves-effect waves-green btn red right">EXCLUIR</button> 
        </form>
        

    </div>
    
  </div>