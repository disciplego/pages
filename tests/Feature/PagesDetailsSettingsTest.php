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

it('hides the page details section by default', function () {

    $page = Pages::factory()->create([
        'is_activated' => true,
        'details' => $this->details,
    ]);

    $this->get($page->slug)
        ->assertDontSee('<!-- Page Details Hero Section-->', false)
        ->assertDontSee($page->title)
        ->assertDontSee($page->details['pre_title'])
        ->assertDontSee('<path d="M24 32C10.7 32 0 42.7 0', false)
        ->assertDontSee($page->details['abbreviation'])
        ->assertDontSee($page->details['description']);

});

it('shows the page details section with setting', function () {

    $page = Pages::factory()->create([
        'is_activated' => true,
        'details' => $this->details,
        'settings' => [
            'show_details' => true,
            'show_icon' => true,
            'show_badge' => true,
            'show_lead' => true,
        ]
    ]);

    $this->get($page->slug)
        ->assertSee('<!-- Page Details Hero Section-->', false)
        ->assertSee($page->title)
        ->assertSee($page->details['pre_title'])
        ->assertSee('<path d="M24 32C10.7 32 0 42.7 0', false)
        ->assertSee($page->details['abbreviation'])
        ->assertSee($page->details['description']);
})->todo();