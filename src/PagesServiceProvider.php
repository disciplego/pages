<?php

namespace Dgo\Pages;

use Dgo\Pages\Middleware\DynamicHomeRoute;
use Dgo\TallFrontend\View\Blocks\Navbar\DefaultComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class PagesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'dgo');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'dgo');
        $this->loadViewsFrom(__DIR__.'/../resources/views/livewire', 'dgo');
         $this->loadViewsFrom(__DIR__.'/../vendor/disciplego/tall-frontend/resources/views/components', 'dgo');
        $this->loadViewsFrom(__DIR__.'/../vendor/disciplego/tall-frontend/resources/views', 'dgo');
         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/../routes/pages.php');

        if (!class_exists('Pages')) {
            class_alias(\Dgo\Pages\Facades\Pages::class, 'Pages');
        }
        Livewire::component('page-index', \Dgo\Pages\Livewire\PageIndex::class);
        $this->app['router']->aliasMiddleware('dynamic.home.route', DynamicHomeRoute::class);
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \Dgo\Pages\Contracts\PagesRepositoryInterface::class,
            \Dgo\Pages\Repositories\PagesRepository::class
        );

        $this->mergeConfigFrom(__DIR__.'/../config/pages.php', 'pages');
        $this->mergeConfigFrom(__DIR__.'/../config/menus.php', 'menus');


        // Register the service the package provides.
        $this->app->singleton('pages', function ($app) {
            return new Pages;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['pages'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/pages.php' => config_path('pages.php'),
            __DIR__.'/../config/menus.php' => config_path('menus.php'),
        ], 'pages.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/dgo'),
        ], 'pages.views');

        // Publishing the migrations.
        /*$this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'pages.migrations');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/dgo'),
        ], 'pages.assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/dgo'),
        ], 'pages.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
