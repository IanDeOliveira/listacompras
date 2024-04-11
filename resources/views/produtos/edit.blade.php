@extends('layouts.app')

@section('content')

<div class="container mt-5">
  <h1>Edite o produto</h1>
  <hr>
  <form action="{{route('produtos-update',['id'=>$produto->id])}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
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
@endsection

@section('title')
    <title>Adicione</title>
@endsection
