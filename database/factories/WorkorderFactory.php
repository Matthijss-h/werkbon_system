<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workorder>
 */
class WorkorderFactory extends Factory
{
    public function definition(): array
    {
        $start = $this->faker->dateTime();
        $end = $this->faker->dateTimeBetween($start, (clone $start)->modify('+1 month'));

        return [
            'employee_name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'start' => $start->format('d-m-Y H:i:s'),
            'end' => $end->format('d-m-Y H:i:s'),
            'status' => $this->faker->randomElement(['open', 'closed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
