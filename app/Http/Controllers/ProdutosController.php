<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Produto; // Importe o Model Produto

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all(); // Recupere todos os produtos do banco de dados

        return view('produtos.index', ['produtos' => $produtos]); // Passe os produtos para a view
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store($lista, Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required',
            'quantidade' => 'required',
            'valor_estimado' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            $path = $file->store('uploads', 'public');

            $data["imagem"] = basename($path);
        }

        $data["lista_id"] = $lista;

        Produto::create($data);

        return redirect()->route('listas.edit', ['lista' => $lista]);
    }

    public function edit($lista, $produto)
    {
        $produto = Produto::find($produto);

        if ($produto) return view('produtos.edit', ['produto' => $produto]);
        else return redirect()->route('listas.index', ['lista' => $lista]);
    }

    public function update($lista, $produto, Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required',
            'quantidade' => 'required',
            'valor_estimado' => 'required'
        ]);

        $data = $request->all();

        $produtoModel = Produto::find($produto);

        if ($request->hasFile('imagem')) {
            if ($produtoModel->imagem) Storage::disk('public')->delete("uploads/" . $produtoModel->imagem);

            $file = $request->file('imagem');
            $path = $file->store('uploads', 'public');

            $data["imagem"] = basename($path);
        }

        $produtoModel->update($data);

        return redirect()->route('produtos.edit', ['lista' => $lista, 'produto' => $produto]);
    }

    public function destroy($lista, $produto)
    {
        $produtoModel = Produto::find($produto);

        Storage::disk('public')->delete("uploads/" . $produtoModel->imagem);

        $produtoModel->delete();

        return redirect()->route('listas.edit', ['lista' => $lista]);
    }
}
