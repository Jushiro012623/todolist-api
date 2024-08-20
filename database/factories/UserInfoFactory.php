<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'middle_name' => fake()->lastName(),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'birth_date' => fake()->date('Y-m-d'),
            'address' => fake()->address(),
            'contact_number' => '09125279523',
            'user_id' => User::factory()
        ];
    }
}

