<?php

namespace Dgo\Pages\Database\Factories;

use Dgo\Pages\Pages;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PagesFactory extends Factory
{
    protected $model = Pages::class;

    public function definition(): array
    {
        return [
            'title' => fake()->words(4, true),
            'title_markdown' => fake()->words(4, true),
            'details' => [
                'abbreviation' => fake()->lexify('???'),
            ],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
