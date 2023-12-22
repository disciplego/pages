<?php

namespace Dgo\Pages\Tests;

use BladeUIKit\BladeUIKitServiceProvider;
use Dgo\MarkdownHelp\MarkdownHelpServiceProvider;
use Dgo\ModelHelp\ModelHelpServiceProvider;
use Dgo\Pages\PagesServiceProvider;
use Dgo\TallFrontend\TallFrontendEventServiceProvider;
use Dgo\ViewHelp\ViewHelpServiceProvider;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Illuminate\Support\Facades\View;
use Laravel\Folio\FolioServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\Concerns\WithLaravelMigrations;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Testbench;
use RalphJSmit\Laravel\SEO\LaravelSEOServiceProvider;

abstract class TestCase extends Testbench
{
    use InteractsWithViews, WithLaravelMigrations, WithWorkbench;

    protected function setUp(): void
    {
        $this->afterApplicationCreated(fn () => View::addLocation(__DIR__.'../vendor/disciplego/pages/resources/views'));
        parent::setUp();

        // Set the application key
        $this->app['config']->set('app.key', 'base64:' .'d2oyZHh2cG01enZoYXZodzR2ZjBpdnpqcnV3Zmw4MHY=');

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Dgo\\Pages\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }
    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__ . '/Feature/Fixtures/2023_11_14_164409_create_test_models_table.php';
        $migration->up();
    }

    protected function getPackageProviders($app): array
    {
        return [
            PagesServiceProvider::class,
            LaravelSEOServiceProvider::class,
            MarkdownHelpServiceProvider::class,
            ModelHelpServiceProvider::class,
            LivewireServiceProvider::class,
            TallFrontendEventServiceProvider::class,
            TallFrontendEventServiceProvider::class,
            ViewHelpServiceProvider::class,
            BladeUIKitServiceProvider::class,
            LaravelSEOServiceProvider::class,
            FolioServiceProvider::class,
            LivewireServiceProvider::class,
            AuthServiceProvider::class,
        ];
    }
}
