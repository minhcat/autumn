<?php

namespace Modules\Fall\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Fall\Events\Handlers\RegisterFallSidebar;

class FallServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterFallSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('greens', array_dot(trans('fall::greens')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('fall', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Fall\Repositories\GreenRepository',
            function () {
                $repository = new \Modules\Fall\Repositories\Eloquent\EloquentGreenRepository(new \Modules\Fall\Entities\Green());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Fall\Repositories\Cache\CacheGreenDecorator($repository);
            }
        );
// add bindings

    }
}
