<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'imagem',
        'categoria',
        'quantidade',
        'valor_estimado',
        'lista_id'
    ];
}
