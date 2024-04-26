@extends('layout')

@section('title', 'Editar Produto')

@section('head')
<style>
#image-preview{
  display: block;
  width: 200px;
  padding: 5px;
  height: 200px;
  border: 1px solid #cccccc;
  border-radius: .25rem;
}
#image-preview img{
  width: 100%;
  height: 100%;
  object-fit: contain;
}
</style>
@endsection

@section('content')
<div class="container mt-5">
  <h1>Edite o produto</h1>
  <hr>
  <form action="{{route('produtos.update',['lista' => request('lista'), 'produto' => $produto->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <div class="mb-3">
        <label class="form-label" for="field-imagem">Imagem</label><br>
        <label for="field-imagem">
          <div id="image-preview">
            <img src="{{ $produto->imagem?asset('uploads/'.$produto->imagem):asset('assets/img/padrao.png')}}" alt="Imagem">
          </div>
        </label>
        <input class="form-control" type="file" id="field-imagem" name="imagem" style="display:none;"> 
      </div>
      <br>
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" value="{{ $produto->nome }}" placeholder="Digite um nome...">
      </div>
      <br>
      <div class="form-group">
        <label for="categoria">Categoria:</label>
        <input type="text" class="form-control" name="categoria" value="{{ $produto->categoria }}" placeholder="Digite uma categoria...">
      </div>
      <br>
      <div class="form-group">
        <label for="quantidade">Quantidade:</label>
        <input type="number" class="form-control" name="quantidade" value="{{ $produto->quantidade }}" placeholder="Digite a quantidade que pretende comprar">
      </div>
      <br>
      <div class="form-group">
        <label for="valor_estimado">Valor estimado:</label>
        <input type="number" class="form-control" name="valor_estimado" value="{{ $produto->valor_estimado }}" placeholder="Digite o valor estimado do produto">
      </div>
      <br>
      <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" style="background-color: #14a484; border-color: #14a484;" value="Atualizar">
      </div>
    </div>
  </form>
</div>

<script>
  document.querySelector("input[name=imagem]").addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
  
    reader.onload = function(event) {
      let preview = document.querySelector('#image-preview');
      preview.innerHTML = '<img src="' + event.target.result + '" alt="Imagem">';
    };
  
    reader.readAsDataURL(file);
  });
</script>
@endsection
