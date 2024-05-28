<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'table_id' => rand(1, 50),
            'item' => $this->faker->word,
            'description' => $this->faker->sentence,
            'date' => $this->faker->dateTimeBetween('2024-01-01', 'now')->format('Y-m-d'),
            'quantity' => rand(1, 10),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'establishment' => $this->faker->company,
            'category' => $this->faker->word,
            'type' => $this->faker->randomElement(['gasto', 'ingreso'])
        ];
    }
}
