<?php

namespace LaraSell\RequestContext\Providers;

use Illuminate\Support\ServiceProvider;
use LaraSell\RequestContext\Managers\ContextManager;

class ContextServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     * 
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ContextManager::class, function () {
            return new ContextManager();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [ContextManager::class];
    }

    /**
     * Bootstrap the context service.
     *
     * @return void
     */
    public function boot()
    {
        $app = $this->app;

        $this->app['request']->macro('context', function () use ($app) {
            return $app[ContextManager::class];
        });
    }
}
