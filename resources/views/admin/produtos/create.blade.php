<div id="create" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">playlist_add</i> Novo produto</h4>
      <div class="row">

        <form action="{{ route('admin.produtos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="input-field col s12">
                    <input id="nome" type="text" name="nome" class="validate" required>
                    <label for="nome">Nome do Produto</label>
                </div>

                <div class="input-field col s12">
                    <input id="preco" type="number" name="preco" class="validate" step="0.01" required>
                    <label for="preco">Preço</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="descricao" name="descricao" class="materialize-textarea" required></textarea>
                    <label for="descricao">Descrição</label>
                </div>

                <div class="input-field col s12">
                    <select name="categoria_id" required>
                        <option value="" disabled selected>Escolha uma Categoria</option>
                        
                        @foreach ($categorias as $c)
                            <option value="{{ $c->id }}">{{ $c->nome }}</option>
                        @endforeach
                    </select>
                    <label>Categoria</label>
                </div>
                
                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>Imagem</span>
                        <input type="file" name="imagem">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload da Imagem" name="imagem_placeholder">
                    </div>
                </div>

            </div>
            
            <button type="submit" class="waves-effect waves-green btn green right">Cadastrar</button>
            
            <a href="#!" class="modal-close waves-effect waves-red btn-flat left">Cancelar</a>

        </form>

      </div>
    </div>
</div>