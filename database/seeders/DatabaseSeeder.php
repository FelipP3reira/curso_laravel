<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // ...
    public function run(): void
    {
        // Garante que o usuário 'Felipe' seja criado
        $this->call(usersSeeder::class); 

        // 1. Crie 10 usuários extras com o factory (Opcional, mas útil para testes)
        // User::factory(10)->create(); 
        
        // 2. Chame os seeders dependentes em ordem correta
        $this->call([
            CategoriasSeeder::class, // Cria Categorias (o Produto precisa delas)
            ProdutosSeeder::class,   // Cria Produtos (o ÚLTIMO, pois depende de tudo)
        ]);
    }
}