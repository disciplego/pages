<?php

use Dgo\Pages\Tests\Feature\Fixtures\TestModel;

beforeEach(function () {
    $this->model = new TestModel();
});
it('has a page relationship', function () {

    expect($this->model->page())->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\MorphOne::class);
});

it('has a title identifier', function () {

    expect($this->model->titleIdentifier())->toBeInstanceOf(Illuminate\Database\Eloquent\Casts\Attribute::class)
        ->and($this->model->titleIdentifier)->toEqual('title');
});

it('can associate a page with the model', function () {
    $model = TestModel::create([
        'title' => 'Test Title',
    ]);

    $page = Pages::factory()->create();

    $model->page()->save($page);

    expect($page->pageable)->toBeInstanceOf(TestModel::class)
        ->and($page->pageable->title)->toEqual('Test Title')
        ->and($page->pageable->id)->toEqual($model->id);
});