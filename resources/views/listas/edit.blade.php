@extends('layout')

@section('title', 'Lista #'.$lista->id)

@section('content')
<div class="container mt-5">
  <h1>Lista #{{$lista->id}}</h1>
  <hr>
  <div class="row">
    <div class="col-sm">
      <h2>Produtos</h2>
    </div>
    <div class="col-sm-auto">
      <a href="{{ route('produtos.create', ['lista'=>$lista->id]) }}" class="btn btn-primary">Adicione um item na lista</a>
    </div>
  </div>

  @php($produtos = $lista->produtos()->paginate(10))

  @if($produtos->isNotEmpty())
    <table class="table table-hover">
      <colgroup>
        <col style="width:0;">
        <col style="width:0;">
        <col style="width:auto;">
        <col style="width:0;">
        <col style="width:0;">
        <col style="width:0;">
      </colgroup>
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Imagem</th>
              <th scope="col">Nome</th>
              <th scope="col">Quantidade</th>
              <th class="text-nowrap" scope="col">Valor estimado</th>
              <th class="text-center" scope="col">...</th>
          </tr>
      </thead>
      <tbody>
          @foreach($produtos as $produto)
          <tr>
              <td class="align-middle">{{ $produto->id }}</th>
              <td class="align-middle">
                <img style="width:40px; height:40px; object-fit:cover;" src="{{ $produto->imagem?asset('uploads/'.$produto->imagem):asset('assets/img/padrao.png') }}">
              </td>
              <td class="align-middle">{{ $produto->nome }}</th>
              <td class="align-middle">{{ $produto->quantidade }}</th>
              <td class="align-middle">R$ {{ number_format($produto->valor_estimado, 2, ',', '.') }}</th>
              <td class="d-flex align-items-center justify-content-center">
                <a href="{{ route('produtos.edit', ['lista' => request('lista'),'produto'=>$produto->id] ) }}" class="btn btn-primary mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                </a>
                <form action="{{ route('produtos.destroy', ['lista' => request('lista'), 'produto' => $produto->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" style="background-color:#b94a48; color:#ffffff; border-color:#b94a48;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                      </svg>
                  </button>
                </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>

    {{ $produtos->links() }}
  @else
    <p class="text-muted font-italic mt-4">Ainda não ha produtos</p>
  @endif
</div>
@endsection
