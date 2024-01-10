<?php


use Dgo\Pages\MenuItem;

it('associates an Item with a Model', function ($menuableModel) {
    $model = $menuableModel::factory()->create();
    $item = MenuItem::factory()->create();

    $item->menuable()->associate($model)->save();

    $this->assertTrue($item->menuable->is($model));
})->with('MenuableModelsToTest');

it('disassociates an Item', function ($menuableModel) {
    $model = $menuableModel::factory()->create();
    $item = MenuItem::factory()->create(['menuable_id' => $model->id, 'menuable_type' => $menuableModel]);

    $item->menuable()->dissociate()->save();

    $this->assertNull($item->fresh()->menuable);
})->with('MenuableModelsToTest');