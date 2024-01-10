<?php

use Dgo\Pages\Menu;
use function Pest\Laravel\assertModelExists;

it('can create a menu', function () {
    $menu = Menu::factory()->create();
    assertModelExists($menu);
});

it('has default menus', function () {
    $this->seed(\Dgo\Pages\Database\Seeders\MenuSeeder::class);
    $menus = Menu::all()->toArray();
    expect(\Illuminate\Support\Arr::flatten($menus))->toContain('main-menu', 'footer-menu', 'social-share-menu', 'user-menu');
});