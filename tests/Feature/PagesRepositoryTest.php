<?php

use Dgo\Pages\Contracts\PagesRepositoryInterface;
use Dgo\Pages\Pages;

it('should return a page and markdown by slug', function () {
    $page = Pages::factory()->create([
        'slug' => 'test-page',
    ]);

    $repository = app(PagesRepositoryInterface::class);
    $fetchedPage = $repository->getPageAndMarkdownBySlug('test-page');

    expect($fetchedPage['page']->slug)->toBe('test-page');
});

it('should return null when fetching a non-existent page', function () {
    $repository = app(PagesRepositoryInterface::class);
    $fetchedPage = $repository->getPageAndMarkdownBySlug('non-existent-slug');
    expect($fetchedPage)->toBeNull();
});

it('should not render Markdown when use_markdown is false', function () {
    $page = Pages::factory()->create([
        'slug' => 'test-page',
        'settings' => ['use_markdown' => false]
    ]);

    $repository = app(PagesRepositoryInterface::class);
    $fetchedPage = $repository->getPageAndMarkdownBySlug('test-page');

    expect($fetchedPage['markdown'])->toBeNull();
});

it('should set the correct published_at date', function () {
    $page = Pages::factory()->create([
        'slug' => 'test-page',
        'published_at' => now()->subDays(1)
    ]);

    $repository = app(PagesRepositoryInterface::class);
    $fetchedPage = $repository->getPageAndMarkdownBySlug('test-page');

    expect($fetchedPage['page']->published_at)->toBeInstanceOf(Carbon\Carbon::class)
        ->and($fetchedPage['page']->published_at->isYesterday())->toBeTrue();
});