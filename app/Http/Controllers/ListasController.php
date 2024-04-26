<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Lista;
use App\Models\Produto;

class ListasController extends Controller
{
    public function index()
    {
        $listas = auth()->user()->listas()->paginate(10);

        return view("listas.index", compact("listas"));
    }

    public function edit($lista)
    {
        $lista = Lista::find($lista);

        return view("listas.edit", compact("lista"));
    }

    public function store()
    {
        $lista = Lista::create(["status" => "inativo", "user_id" => auth()->user()->id]);

        return redirect()->route("listas.edit", $lista->id);
    }

    public function destroy($lista)
    {
        Lista::find($lista)->delete();

        return redirect()->back();
    }
}
