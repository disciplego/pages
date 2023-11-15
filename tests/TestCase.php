<?php

namespace Dgo\Pages\Tests;

use Dgo\MarkdownHelp\MarkdownHelpServiceProvider;
use Dgo\ModelHelp\ModelHelpServiceProvider;
use Dgo\Pages\PagesServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Orchestra\Testbench\TestCase as Testbench;
use RalphJSmit\Laravel\SEO\LaravelSEOServiceProvider;

abstract class TestCase extends Testbench
{
    use InteractsWithViews;

    protected function setUp(): void
    {
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
        ];
    }
}
