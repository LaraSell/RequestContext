<?php

namespace LaraSell\RequestContext\Providers;

use LaraSell\RequestContext\Managers\ContextManager;

class ContextServiceProvider extends Illuminate\Support\ServiceProvider
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
     * Boot methods for the package
     */
    public function boot()
    {
        $app = $this->app;

        $this->app['request']->macro('context', function () use ($app) {
            return $app[ContextManager::class];
        });
    }
}
