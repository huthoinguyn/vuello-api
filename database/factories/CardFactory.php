<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    : array{
        return [
            'title'       => $this->faker->name(),
            'description' => $this->faker->sentence(3, TRUE),
            'column_id'   => \App\Models\Column::factory(),
            'board_id'    => \App\Models\Board::factory(),
            'created_by'  => \App\Models\User::factory(),
            'due_date'    => $this->faker->dateTime(),
            'assigned_to' => \App\Models\User::factory(),
        ];
    }
}
