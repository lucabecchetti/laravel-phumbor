<?php

namespace Brokenice\LaravelPhumbor;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Thumbor\Url\BuilderFactory;
use Config;

class LaravelPhumborServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Add additional permission config file
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('phumbor.php'),
        ], 'phumbor');
    }

    /**
     * Merge configuration.
     *
     * @return void
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'phumbor'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfig();
        $this->app->bind('phumbor',function(){
            return new BuilderFactory(Config::get('phumbor.server'), Config::get('phumbor.key'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [BuilderFactory::class];
    }
}
