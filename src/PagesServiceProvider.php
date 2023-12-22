<?php

namespace Dgo\Pages;

use Dgo\Pages\Middleware\DynamicPageRoute;
use Dgo\TallFrontend\View\Blocks\Navbar\DefaultComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/../routes/pages.php');

        if (!class_exists('Pages')) {
            class_alias(\Dgo\Pages\Facades\Pages::class, 'Pages');
        }

        Blade::componentNamespace('Dgo\\TallFrontend\\View', 'dgo');
        Blade::component(DefaultComponent::class, 'dgo::blocks.navbar');
        Blade::component(\Dgo\TallFrontend\View\Blocks\Breadcrumb\DefaultComponent::class, 'dgo::blocks.breadcrumb');

        $this->app['router']->aliasMiddleware('dynamic.page.route', DynamicPageRoute::class);
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
