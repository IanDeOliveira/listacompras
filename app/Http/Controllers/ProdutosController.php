<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; // Importe o Model Produto

class ProdutosController extends Controller
{
    public function index() {
        $produtos = Produto::all(); // Recupere todos os produtos do banco de dados
        //dd($produtos);
        return view('produtos.index', ['produtos' => $produtos]); // Passe os produtos para a view
    }

    public function create() {
        return view('produtos.create');
    }

    public function store(Request $request) {
        Produto::create($request->all());
        return redirect()->route('produtos-index');
    }

    public function edit($id) {
        $produto = Produto::find($id);
        if(!empty($produto)) {
            return view('produtos.edit', ['produto' => $produto]);
        } else {
            return redirect()->route('produtos-index');
        }
    }
    
    public function update(Request $request, $id) {
       $data = [
        'nome' =>$request->nome,
        'categoria' =>$request->categoria,
        'quantidade' =>$request->quantidade,
        'valor_estimado' =>$request->valor_estimado,
       ];
       Produto::where('id',$id)->update($data);
       return redirect()->route('produtos-index');
    }

    public function destroy($id) {
       Produto::where('id',$id)->delete();
       return redirect()->route('produtos-index');
     }
}

