<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // 1. CRIE OS USUÁRIOS (DESCOMENTADO)
    User::factory(10)->create(); 
    
    $this->call([
        // 2. Chame os seeders dependentes em ordem correta
        // Se tiver um UserSeeder, use ele, senão, use a linha acima
        CategoriasSeeder::class, // Categorias
        ProdutosSeeder::class,   // Produtos (depende de Users e Categorias)
    ]);
}
}
