<?php

namespace Dgo\Pages;

use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;
use function Orchestra\Testbench\package_path;

class FolioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        Folio::path(base_path('vendor/disciplego/pages/resources/views/pages/'))->middleware([
            '*' => [
                \Dgo\Pages\Middleware\CheckIndexRoute::class,
            ],
        ]);
        Folio::path(resource_path('views/pages'))->middleware([
            '*' => [
                \Dgo\Pages\Middleware\CheckIndexRoute::class,
            ],
        ]);

    }
}
