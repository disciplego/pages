<?php

namespace Dgo\Pages\Database\Factories;

use Dgo\Pages\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MenuItemFactory extends Factory
{
    protected $model = MenuItem::class;

    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'url' => '#',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
