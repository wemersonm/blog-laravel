<?php

namespace Database\Factories;
use \Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $categories = [
            'Desenvolvimento Web',
            'Segurança da Informação',
            'Redes e Infraestrutura',
            'Ciência de Dados',
            'Inteligência Artificial',
            'Desenvolvimento Mobile',
            'Administração de Banco de Dados',
            'Programação',
            'Cloud Computing',
            'Gestão de Projetos de TI',
        ];
        $category = $this->faker->unique()->randomElement($categories);
        return [
            'NameCategory'=> $category,
            'SlugCategory'=> Str::slug($category)
        ];
    }
}
