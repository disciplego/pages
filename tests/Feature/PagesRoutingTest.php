<?php

it('has a home route', function () {
$page = Pages::factory()->create([
    'slug' => 'index',
    'is_activated' => true,
]);

    $this->get(route('home'))->assertOk();
});
