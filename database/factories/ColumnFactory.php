<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Column>
 */
class ColumnFactory extends Factory{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    : array{
        return [
            'name'     => $this->faker->name(),
            'board_id' => \App\Models\Board::factory(),
        ];
    }
}
