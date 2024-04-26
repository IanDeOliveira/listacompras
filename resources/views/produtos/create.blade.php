@extends('layout')

@section('title', 'Adicionar Produto')

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
  <h1>Adicione um produto na sua lista de compras</h1>
  <hr>
  <form action="{{route('produtos.store', ['lista' => request('lista')])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <div class="mb-3">
        <label class="form-label" for="field-imagem">Imagem</label><br>
        <label for="field-imagem">
          <div id="image-preview">
            <img src="{{old('imagem')??asset('assets/img/padrao.png')}}" alt="Imagem">
          </div>
        </label>
        <input class="form-control" type="file" id="field-imagem" name="imagem" style="display:none;">
        @error('imagem')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror 
      </div>
      <br>
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Digite um nome..." value="{{ old('nome') }}">
        @error('nome')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <br>
      <div class="form-group">
        <label for="categoria">Categoria:</label>
        <input type="text" class="form-control @error('categoria') is-invalid @enderror" name="categoria" placeholder="Digite uma categoria..." value="{{ old('categoria') }}">
        @error('categoria')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <br>
      <div class="form-group">
        <label for="quantidade">Quantidade:</label>
        <input type="number" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" placeholder="Digite a quantidade que pretende comprar" value="{{ old('title') }}">
        @error('quantidade')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <br>
      <div class="form-group">
        <label for="valor_estimado">Valor estimado:</label>
        <input type="number" class="form-control @error('valor_estimado') is-invalid @enderror" name="valor_estimado" placeholder="Digite o valor estimado do produto" value="{{ old('valor_estimado') }}">
        @error('valor_estimado')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <br>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Adicionar</button>
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
