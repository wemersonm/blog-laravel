<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $image = $this->faker->image('public/images/posts',640,480);
        return [
            'IdCategory' => Category::pluck("IdCategory")->random(),
            'IdUser' => User::pluck("IdUser")->random(),
            'Title' => $title =  $this->faker->text(rand(60, 140)),
            'Body' => $this->faker->paragraph(rand(10, 30)),
            'SlugPost' => Str::slug($title),
            'thumbPost' => str_replace('public','',$image),
        ];
    }
}
