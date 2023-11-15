<?php

use Dgo\Pages\Pages;
use Dgo\Pages\Tests\Feature\Fixtures\Author;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use function Pest\Laravel\assertModelExists;

use Illuminate\Database\Eloquent\Relations\BelongsTo;



it('can create a page', function () {
    $pages = Pages::create(
        [
            'title' => 'Test Title',
            'slug' => 'test-title',
            ]
    );

    $this->assertDatabaseHas('pages', [
        'title' => 'Test Title',
    ]);
});

it('casts a datetime if published_at field set', function () {
    $date = $this->faker->date();
    $page = Pages::factory()->create([
        'published_at' => $date,
    ]);
    expect($page->published_at)->toBeInstanceOf(\Carbon\Carbon::class);

});

it('has block array fields', function () {
    $array = $this->faker->words();
    $page = Pages::factory()->create([
        'details' => $array,
        'settings' => $array,
        'blocks' => $array,
    ]);
    $this->assertIsArray($page->details);
    $this->assertEquals($array, $page->details);
    $this->assertIsArray($page->settings);
    $this->assertEquals($array, $page->settings);
    $this->assertIsArray($page->blocks);
    $this->assertEquals($array, $page->blocks);
});

it('has a author_id relationship', function () {

    config()->set('pages.author_model', Author::class);

    $page = Pages::factory()->create();

    $relation = $page->author_id();

    $this->assertInstanceOf(BelongsTo::class, $relation);
    $this->assertInstanceOf(Author::class, $relation->getRelated());
});

it('has a pageable relationship', function () {
    $page = Pages::factory()->create();

    $relation = $page->pageable();

    $this->assertInstanceOf(MorphTo::class, $relation);
});

it('casts title to a stripped string and saves markdown ', function () {
    $markdown = '# **Hello** _World_';
    $page = Pages::factory()->create([
        'title_markdown' => $markdown,
    ]);
    expect($page->title)->toEqual('Hello World')
        ->and($page->slug)->toEqual('hello-world')
        ->and($page->title_markdown)->toEqual($markdown);
});
