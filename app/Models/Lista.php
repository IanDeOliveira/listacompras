<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function getTotalAttribute()
    {
        return $this->produtos()->sum('valor_estimado');
    }
}
