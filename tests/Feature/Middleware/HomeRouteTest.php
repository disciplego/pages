<?php

it('has a home route that returns an index slug', function () {

    $this->withoutExceptionHandling();
    $request = $this->get(route('home'));

        $request->assertStatus(200);
});
