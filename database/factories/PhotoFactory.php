<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'url' => 'https://picsum.photos/seed/' . uniqid() . '/600/400',
            'workorder_id' => random_int(1, 10),
        ];
    }
}
