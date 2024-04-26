<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Lista;
use App\Models\Produto;

class firstRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'João da Silva',
            'email' => 'joao.silva@email.com',
            'password' => bcrypt('12345678')
        ]);

        $lista = Lista::create([
            'user_id' => $user->id
        ]);

        Produto::create([
            'nome' => 'Leite',
            'categoria' => 'Mercearia',
            'quantidade' => 1,
            'valor_estimado' => 15,
            'lista_id' => $lista->id
        ]);

        Produto::create([
            'nome' => 'Detergente',
            'categoria' => 'Limpeza',
            'quantidade' => 2,
            'valor_estimado' => 2.50,
            'lista_id' => $lista->id
        ]);

        Produto::create([
            'nome' => 'Picanha',
            'categoria' => 'Açougue',
            'quantidade' => 1.5,
            'valor_estimado' => 70,
            'lista_id' => $lista->id
        ]);
    }
}
