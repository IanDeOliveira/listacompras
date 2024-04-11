@extends('layouts.app')

@section('content')

<div class="container mt-5">
  <h1>Adicione um produto na sua lista de compras</h1>
  <hr>
  <form action="{{route('produtos-store')}}" method="POST">
    @csrf
    <div class="form-group">
      <br>
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" placeholder="Digite um nome...">
      </div>
      <br>
      <div class="form-group">
        <label for="categoria">Categoria:</label>
        <input type="text" class="form-control" name="categoria" placeholder="Digite uma categoria...">
      </div>
      <br>
      <div class="form-group">
        <label for="quantidade">Quantidade:</label>
        <input type="number" class="form-control" name="quantidade" placeholder="Digite a quantidade que pretende comprar">
      </div>
      <br>
      <div class="form-group">
        <label for="valor_estimado">Valor estimado:</label>
        <input type="number" class="form-control" name="valor_estimado" placeholder="Digite o valor estimado do produto">
      </div>
      <br>
      <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" style="background-color: #14a484; border-color: #14a484;">
      </div>
    </div>
  </form>
</div>
@endsection

@section('title')
    <title>Adicione</title>
@endsection
