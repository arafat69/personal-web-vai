<?php

namespace Arafat\LaravelRepository;

use Arafat\LaravelRepository\Commands\RepositoryCommand;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('repository', function ($app) {
            return new \Arafat\LaravelRepository\Repository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    protected function registerPublishables(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../stubs/' => base_path('media-library.php'),
        ], 'config');

        if (empty(glob(database_path('migrations/*_create_media_table.php')))) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_media_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_media_table.php'),
            ], 'migrations');
        }

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/media-library'),
        ], 'views');
    }

    protected function  registerCommands(): void{
        $this->app->bind('command.make:repository', RepositoryCommand::class);
        $this->commands(['command.make:repository']);
    }
}
