<?php

use Dgo\Pages\PagesServiceProvider;
use Illuminate\Contracts\Foundation\Application;

it('registers the PagesServiceProvider', function () {
    $app = $this->app;
    $registeredProviders = array_keys($app->getLoadedProviders());
    expect($registeredProviders)->toContain(PagesServiceProvider::class);
});
