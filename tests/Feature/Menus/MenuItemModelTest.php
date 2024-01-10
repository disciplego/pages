<?php

use Dgo\Pages\Menu;
use Dgo\Pages\MenuItem;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;

it('can create an item', function () {
    $item = MenuItem::factory()->create();
    $this->assertModelExists($item);
});

it('has the required columns in the items table', function () {
    $columns = ['id', 'parent_id', 'title', 'slug', 'icon', 'url', 'route', 'target', 'help_text', 'created_at', 'updated_at', 'is_activated', 'order_column'];
    foreach ($columns as $column) {
        $this->assertTrue(Schema::hasColumn('menu_items', $column));
    }
});

it('uses Childable, SoftDeletes, HasSlug, Sortable and Sluggable traits', function () {
    $item = new MenuItem();

    $this->assertContains(SoftDeletes::class, class_uses($item));
    $this->assertContains(HasSlug::class, class_uses($item));
    $this->assertContains(Sortable::class, class_implements($item));
    $this->assertTrue(method_exists($item, 'getSlugOptions'));
    $this->assertContains('Dgo\ModelHelp\Traits\Childable', class_uses($item));
    $this->assertContains(SortableTrait::class, class_uses($item));
});

it('has a parent menu relationship', function () {
    $menu = Menu::factory()->create();
    $item = MenuItem::factory()->hasAttached($menu)->create();
    $this->assertInstanceOf(Menu::class, $item->menus->first());
    $this->assertEquals($menu->id, $item->menus->first()->id);
});

it('uses url if only url is set', function () {
    $item = MenuItem::factory()->create(['url' => 'url.only']);
    expect($item->url)->toEqual('url.only');
});

it('uses route if only route is set', function () {
    $item = MenuItem::factory()->create(['route' => 'page.index']);
    expect($item->url)->toEqual(route('page.index'));
});

it('uses Menuable model slug if only Menuable model is set', function () {
    $model = Pages::factory()->create();
    $item = MenuItem::factory()->create();
    $item->menuable()->associate($model)->save();
    $item->refresh();
    expect($item->url)->toEqual($model->slug);
});

it('prefers route over url if both are set', function () {
    $item = MenuItem::factory()->create(['url' => 'skip.url', 'route' => 'page.index']);
    expect($item->url)->toEqual(route('page.index'));
});

it('prefers Menuable model slug over both url and route if all are set', function () {
    $model = Pages::factory()->create();
    $item = MenuItem::factory()->create(['url' => 'skip.url', 'route' => 'page.index']);
    $item->menuable()->associate($model)->save();
    $item->refresh();
    expect($item->url)->toEqual($model->slug);
});