<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Categoria;
use Illuminate\Support\Str; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = $this->faker->unique()->sentence();
        return [
            'nome' => $nome,
            'descricao' => $this->faker->unique()->paragraph(),
            'preco' => $this->faker->randomNumber(2),
            'slug'  => Str::slug('$nome'),
            'imagem' => 'https://via.placeholder.com/400x400.png?text=Produto+Teste',
            'id_user'=> User::pluck('id')->random(),
            //pluck e um metodo de extrair uma informacao da tabela
            'id_categoria' => Categoria::pluck('id')->random(),
        ];
    }
}
