<?php

use Dgo\Pages\Pages;

beforeEach(function () {
    $this->details = [
        'pre_title' => fake()->jobTitle,
        'icon' => 'fas-barcode',
        'abbreviation' => fake()->asciify(),
        'description' => fake()->paragraph()
    ];
});