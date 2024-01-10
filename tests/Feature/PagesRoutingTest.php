<?php

it('has a home route', function () {
$page = Pages::factory()->create([
    'slug' => 'index',
    'is_activated' => true,
]);
dd($page);
    $this->get(route('home'))->assertOk();
});
