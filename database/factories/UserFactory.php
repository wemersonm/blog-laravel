<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'Username' => $this->faker->unique()->userName,
            'UserFullname' => $this->faker->name,
            'UserBio' => $this->faker->sentence(rand(8,16)),
            'Email' => $this->faker->unique()->safeEmail,
            'Password' => bcrypt('12121212'),
            'UserImage' => str_replace('public','',$image),
            'Active' => 1,
            'CreatedAt' => now(),
            'UpdatedAt' => now(),
        ];
    }
}
