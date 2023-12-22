<?php

it('has a home route that returns an index slug', function () {

    $this->withoutExceptionHandling();
    $this->get(route('home'))
        ->assertStatus(200);
});
